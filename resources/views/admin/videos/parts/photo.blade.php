@if($video->photo == null)
    <img src="http://img.youtube.com/vi/{{$video->link}}/0.jpg"
         width="100" height="80"
         class="img-fluid img-thumbnail"/>
@else
    <img src="{{asset('adminBoard/uploadedImages/videos/'.$video->photo)}}"
         width="100" height="80"
         class="img-fluid img-thumbnail"/>
@endif




