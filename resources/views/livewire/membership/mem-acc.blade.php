<div>
    @if($member)
        <h5>Member Details</h5>
        <ul>
            <li>ID: {{ $member->member_id_no }}</li>
            <li>Name: {{ $member->mem_first_name }} {{ $member->mem_last_name }}</li>
            <li>Middle: {{ $member->mem_middle_name }}</li>
            <li>PRC No: {{ $member->mem_prc_no }}</li>
            <li>PSA Chapter: {{ $member->psa_chapter_code }}</li>
        </ul>
    @else
        <p>Select a member to see details</p>
    @endif
</div>