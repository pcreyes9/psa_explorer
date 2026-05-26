<!DOCTYPE html>
<html>
    <head>
        <title>{{ $info->mem_first_name }} {{ $info->mem_last_name }} - Certificate of Good Standing</title>

        <style>
            @page {
                size: A4;
                margin: 0;
            }

            body {
                margin: 0;
                padding: 0;
                width: 210mm;
                height: 297mm;
                font-family: Arial, sans-serif;
                color: #000;

                /* Letterhead background */
                background-image: url("{{ public_path('images/LETTERHEAD 2026.png') }}");
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            .content {
                /* Use margins instead of huge padding */
                margin: 700px 90px 80px 950px; /* top, right, bottom, left */
                font-size: 45px;
                line-height: 1.8;
                /* text-align: justify; */
            }

            .title {
                text-align: center;
                font-size: 60px;
                font-weight: bold;
                letter-spacing: 5px;
                margin-bottom: 150px;
            }

            .underline {
                display: inline-block;         /* makes the span respect width */
                border-bottom: 2px solid #000; /* underline spans full width */
                font-weight: bold;
                line-height: 1.2;
                padding: 0 50px;               /* adds space left & right under the line */
                text-align: center;            /* optional: center text inside underline */
            }

            .center {
                text-align: center;
            }

            .signature-block{
                text-align: center;
                margin-top: 150px;
            }

            .signature-img{
                width: 600px;      /* adjust size */
                height: auto;
                display: block;
                margin: 0 auto 0 auto;  /* centers image and adds space below */
            }

            .sig-name{
                font-size: 45px;
                font-weight: bold;
            }

            .sig-title{
                font-size: 40px;
            }

            /* Utility spacing */
            .mt-20 { margin-top: 20px; }
            .mt-30 { margin-top: 30px; }
            .mt-40 { margin-top: 40px; }
        </style>
    </head>

    <body>
        <div class="content">
            <div class="title">C E R T I F I C A T I O N</div>

            <p>To Whom it May Concern:</p> <br>

            <p class="mt-30">
                This certifies that 
                <span class="underline"><i>{{ strtoupper($info->mem_first_name.' '.$info->mem_last_name) }}, MD, FPSA</i></span>,
                is a member of Good Standing for Fiscal Year
                <span class="underline"><i>2025</i></span>
                and is classified as
                <span class="underline"><i>{{ $info->Memtype }}</i></span>
                of the Philippine Society of Anesthesiologists, Inc.
                He/She is also a member of World Federation of Societies of Anaesthesiologists (WFSA).
            </p>

            <p class="mt-30">
                This certification is being issued upon the request of <br>
                <span class="underline"><i>DR. {{ strtoupper($info->mem_last_name) }}</i></span>
                for
                <span class="underline"><i>{{ $purpose }}</i></span>.
            </p>

            <p class="mt-40">
                Given this 
                <span class="underline"><i>{{ date('jS \d\a\y \o\f F Y') }}</i></span>
                at Suite 102, PSA Secretariat Office, PMA Building, North Avenue, Quezon City, Philippines.
            </p>

            <div class="signature-row ">

                <div class="signature-block">
                    <img src="{{ public_path('images/morete sig.png') }}" class="signature-img">
                    <div class="sig-name">JOSELITO T. MORETE, MD, FPSA</div>
                    <div class="sig-title">Secretary, PSA, Inc.</div>
                </div>

                <div class="signature-block">
                    <img src="{{ public_path('images/mayuga sig.png') }}" class="signature-img">
                    <div class="sig-name">FRANCIS B. MAYUGA, MD, FPSA</div>
                    <div class="sig-title">President, PSA, Inc.</div>
                </div>
            </div>
        </div>
    </body>
</html>