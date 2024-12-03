
<a href="{{route('admin.add.other.album.photos',$photoAlbum->id)}}" class="btn btn-hover-primary btn-icon btn-pill "
   title="{{__('photoAlbums.add_other_album_photos')}}">
    <i class="fa fa-plus-square fa-1x"></i>
</a>


<a href="{{route('admin.photo.albums.edit',$photoAlbum->id)}}" class="btn btn-hover-primary btn-icon btn-pill "
   title="{{__('general.edit')}}">
    <i class="fa fa-edit fa-1x"></i>
</a>

<a href="#" class="btn btn-hover-danger btn-icon btn-pill delete_photo_album_btn" data-id="{{$photoAlbum->id}}"
   title="{{__('general.delete')}}">
    <i class="fa fa-trash fa-1x"></i>
</a>


