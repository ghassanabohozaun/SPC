@if($comment->photo == null)
    @if($comment->gender == __('general.male'))
        <img src="{{asset('adminBoard/images/male.jpeg')}}"
             class="img-fluid img-thumbnail table-image"/>
    @elseif($comment->gender == __('general.female'))
        <img src="{{asset('adminBoard/images/female.jpeg')}}"

             class="img-fluid img-thumbnail table-image"/>
    @endif
@else
    <img src="{{asset('adminBoard/uploadedImages/articles/comments/'.$comment->photo)}}"
         width="100" height="80"
         class="img-fluid img-thumbnail table-image"/>
@endif




