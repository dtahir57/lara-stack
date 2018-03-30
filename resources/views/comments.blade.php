<div class="row">
  <div class="col-md-12">
    <form class="form-inline" action="{{ route('postComment') }}" method="post" style="float: right;" />
      {{ csrf_field() }}
      <div class="form-group mx-sm-3 mb-2">
        <input type="text" class="form-control" required name="q_comment" placeholder="Write A Comment" />
      </div>
      <input type="hidden" name="question_id" value="{{$q->id}}">
      <input type="submit" class="btn btn-outline-warning" value="Comment">
    </form>
  </div>
</div>
