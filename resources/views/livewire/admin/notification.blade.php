<div>

    <style>
         .right-menu-item {
            color: #777777;
            display: inline-block;
        }
         .bg-unread{
             background: #f3f3f3 !important;
         }
         .dropdown-large{
             width: 320px;
         }
    </style>

    <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
        <i class="mdi mdi-bell"></i>
        @php $unreadNotification = auth()->user()->unreadNotifications @endphp
        <span class="badge up {{ count($unreadNotification) <= 10 ? 'badge-success' : 'badge-danger' }} badge-pill">{{ count($unreadNotification) > 0 ? count($unreadNotification) : '' }}</span>
    </a>
    <ul class="dropdown-notification dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-large user-list notify-list">
        <li>
            <h5>Notifications</h5>
        </li>

        @php $i = 0 @endphp
        @forelse(auth()->user()->notifications as $notification)
            @php $i++ @endphp
            @if($i == 8)
                @break
            @endif
            <li>
                <ul class="user-list-item list-unstyled d-flex mr-0 {{ ($notification->read_at == null) ? 'bg-unread' : '' }}">
                    <li style="width: 84%">
                        <a href="{{ notification_url($notification->data['url'] ?? '#') }}" class="text-dark" wire:click="singleMarkNotification('{{ $notification->id }}')" >
                            <div class="icon bg-info">
                                <i class="{{ $notification->data['icon'] ?? '' }}"></i>
                            </div>
                            <div class="user-desc">
                                <p class="name m-0">{{ $notification->data['message_title'] ?? '' }}</p>
                                <small class="time">{{ $notification->data['message_details'] ?? '' }}</small>
                            </div>
                        </a>
                    </li>
                    <li class="text-right" style="width: 8%">
                        @if($notification->read_at == null)
                            <i title="mark as read" class="cursor-pointer text-muted fas fa-envelope" wire:click="singleMarkNotification_mark('{{ $notification->id }}')" data-toggle="tooltip" data-placement="top" ></i>
                        @else
                            <i title="mark as unread" class="cursor-pointer text-muted fas fa-envelope-open" wire:click="singleMarkNotification_mark('{{ $notification->id }}')" data-toggle="tooltip" data-placement="top" ></i>
                        @endif
                    </li>
                    <li class="text-right" style="width: 8%">
                        <i wire:click="singleMarkNotification_delete('{{ $notification->id }}')" class="cursor-pointer text-muted fas fa-trash-alt" title="delete notification" data-toggle="tooltip" data-placement="top" ></i>
                    </li>
                </ul>
            </li>
        @empty
            <p class="py-5 text-center">No Notifications Found</p>
        @endforelse


        <li class="all-msgs text-center">
            <p class="m-0"><a href="#">See all Notification</a></p>
        </li>
    </ul>
    @push('footer_javascript')
        <script>

        </script>
    @endpush
</div>
