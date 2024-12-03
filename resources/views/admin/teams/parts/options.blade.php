<a href="{{route('admin.team.member.edit',$team->id)}}" class="btn btn-hover-primary btn-icon btn-pill "
   title="{{__('general.edit')}}">
    <i class="fa fa-edit fa-1x"></i>
</a>


<a href="#" class="btn btn-hover-danger btn-icon btn-pill delete_team_member_btn" data-id="{{$team->id}}"
   title="{{__('general.delete')}}">
    <i class="fa fa-trash fa-1x"></i>
</a>


