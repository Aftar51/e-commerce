<div class="modal fade" id="createModalProduct" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Basic Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="col-md-12">
                        <label for="ProductName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="ProductName" name="name"
                            value="{{ old('name') }}">
                    </div>
                    <div class="col-md-12">
                        <label for="ProductPrice" class="form-label">Price</label>
                        <input type="text" class="form-control" id="ProductPrice" name="price">
                    </div>
                    <label class="form-label">Select</label>
                    <div>
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option selected>Choose Category</option>
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="productDesc" class="form-label">Product Description</label>
                        <textarea id="editor" name="description" class="col-10"></textarea>
                    </div>
                    <script>
                        ClassicEditor
                            .create(document.querySelector('#editor'))
                            .then(editor => {
                                console.log(editor);
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    </script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
