import pyodbc
import bcrypt

# --- Step 1: Database connection settings ---
server = 'PSASERVER'
database = 'test_paul'  # Change to your database name
username = 'sa'
password = 'p$a@dm1n'
driver = '{ODBC Driver 17 for SQL Server}'  # Make sure this driver is installed
table_name = 'users'  # Replace with your table name

# Connect to SQL Server
conn = pyodbc.connect(
    f'DRIVER={driver};SERVER={server};DATABASE={database};UID={username};PWD={password}'
)
cursor = conn.cursor()

# --- Step 2: Read all users ---
cursor.execute(f"SELECT psa_user_id, password FROM {table_name}")
users = cursor.fetchall()

# --- Step 3: Hash passwords and update table ---
for user in users:
    user_id = user.psa_user_id
    plain_password = user.password

    # Skip if password already seems hashed (optional safety check)
    if plain_password.startswith("$2y$"):
        print(f"Skipping already hashed password for user: {user_id}")
        continue

    # Hash password using bcrypt
    hashed = bcrypt.hashpw(plain_password.encode('utf-8'), bcrypt.gensalt())
    hashed_str = hashed.decode('utf-8')

    # Update SQL Server
    cursor.execute(
        f"UPDATE {table_name} SET password = ? WHERE psa_user_id = ?",
        (hashed_str, user_id)
    )
    print(f"Password hashed and updated for user: {user_id}")

# Commit changes and close connection
conn.commit()
cursor.close()
conn.close()

print("All passwords have been hashed and updated successfully!")
