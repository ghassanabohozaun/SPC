@if($notifications->isEmpty())
    <img src="{!! asset('site/images/noRecordFound.svg') !!}"
         class="img-fluid" id="no_data_img"
         title="{!! __('site.no_date') !!}">
@else
    @foreach($notifications as $notification)
        <!--begin: Item-->
        <div
            class="d-flex align-items-center  rounded p-5 mb-5 bg-light-info">
			            <span class="svg-icon svg-icon-warning mr-5">
			                <span class="svg-icon svg-icon-lg">
                                @if($notification->notify_class =='unread')
                                  <i class="flaticon-bell text-danger icon-lg"></i>
                                @else
                                    <i class="flaticon-bell text-info icon-lg"></i>

                                @endif
                            </span>
                        </span>

            <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="#" data-id="{!! $notification->id !!}"
                   class="font-weight-normal text-dark-75 text-bold font-size-h5-sm mb-1 show_notification_btn">
                    @if(Lang()=='ar')
                        {!! $notification->title_ar !!}
                    @else
                        {!! $notification->title_en !!}
                    @endif
                </a>
                <span class=" text-warning font-size-sm font-weight-bold">{!! $notification->created_at !!}</span>
            </div>

        </div>
        <!--end: Item-->
    @endforeach
@endif























