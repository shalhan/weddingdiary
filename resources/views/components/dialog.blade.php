<div class="modal fade" id="{{isset($id) ? 'dialog'.$id : 'dialog'}}" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="simpleModalLabel">{{$title}}</h4>
      </div>
      <div class="modal-body">
        <p>{{$slot}}</p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{$action}}">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>