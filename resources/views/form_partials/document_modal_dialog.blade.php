<div class="modal fade" id="documentModalDialog-{{ $r->id }}" role="dialog">

  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>{{ $r->documentType->name }}</b> - ({{ $r->documentType->keterangan }})</h4>
      </div>
      
        <div class="modal-body">
          <img src="{{ asset($r->location) }}" alt="" style="width: 100%;">
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </div>

    
  </div>
</div>