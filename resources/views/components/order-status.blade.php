<span>
    @if($status == 1)
        <span style="border-radius: 3px; padding: 2px 10px; color: white; background-color: #2d8ac7">Pending</span>
    @elseif($status == 2)
        <span style="border-radius: 3px; padding: 2px 10px; color: white; background-color: blueviolet">Processing</span>
    @elseif($status == 3)
        <span style="border-radius: 3px; padding: 2px 10px; color: white; background-color: red">Cancelled</span>
    @elseif($status == 4)
        <span style="border-radius: 3px; padding: 2px 10px; color: white; background-color: green">Delivered</span>
    @endif
</span>
