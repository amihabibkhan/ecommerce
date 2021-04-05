<span>
    @if($role_id == 4)
        <span style="border-radius: 3px; padding: 2px 10px; color: white; background-color: blue">Editor</span>
    @elseif($role_id == 3)
        <span style="border-radius: 3px; padding: 2px 10px; color: white; background-color: #2d8ac7">General User</span>
    @elseif($role_id == 2)
        <span style="border-radius: 3px; padding: 2px 10px; color: white; background-color: blueviolet">Manager</span>
    @elseif($role_id == 1)
        <span style="border-radius: 3px; padding: 2px 10px; color: white; background-color: green">Admin</span>
    @endif
</span>
