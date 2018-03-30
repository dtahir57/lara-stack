<div class="row">
  <div class="col-md-10">
    <h4>Does this answer your question?</h4>
  </div>
  <div class="col-md-2">
    <form action="{{ route('rate.post') }}" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="q_id" value="{{$q->id}}">
      <input type="hidden" name="a_id" value="{{$a->id}}">
      <input type="submit" class="btn btn-success" value="Mark as Answered" />
    </form>
  </div>
</div>
