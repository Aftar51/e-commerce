<div class="modal fade" id="editModalProduct{{ $row->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.product.update', $row->id ) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                    <label for="ProductName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="ProductName" name="name" value="{{ value($row->name) }}">
                </div>
                <div class="col-md-12">
                    <label for="ProductName" class="form-label">Product Category</label>
                    <input type="text" class="form-control" id="ProductName" name="name" value="{{ value($row->category->name) }}">
                </div>
                <div class="col-md-12">
                    <label for="ProductName" class="form-label">Product Description</label>
                    <input type="text" class="form-control" id="ProductName" name="name" value="{{ value($row->description) }}">
                </div>
                <div class="col-md-12">
                    <label for="ProductName" class="form-label">Product Price</label>
                    <input type="text" class="form-control" id="ProductName" name="name" value="{{ value($row->price) }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>