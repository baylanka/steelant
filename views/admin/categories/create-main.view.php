    <div class="modal-dialog modal-md" >
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Main Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form>


                   <label for="basic-url" class="form-label">Name</label>
                   <div class="input-group mb-3">
                       <input type="text" class="form-control" placeholder="Category name" aria-label="Category name" aria-describedby="basic-addon2">
                       <span class="input-group-text" id="basic-addon2">Duestch</span>
                   </div>
                   <div class="input-group mb-3">
                       <input type="text" class="form-control" placeholder="Category name" aria-label="Category name" aria-describedby="basic-addon2">
                       <span class="input-group-text" id="basic-addon2">English</span>
                   </div>
                   <div class="input-group mb-3">
                       <input type="text" class="form-control" placeholder="Category name" aria-label="Category name" aria-describedby="basic-addon2">
                       <span class="input-group-text" id="basic-addon2">French</span>
                   </div>



                   <div class="input-group mb-3">
                       <span class="input-group-text" id="basic-addon3">Thumbnail image</span>
                       <input type="file" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                   </div>

                   <label for="basic-url" class="form-label">Visibility</label>
                   <div class="form-check">
                       <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                       <label class="form-check-label" for="flexRadioDefault1">
                           Public
                       </label>
                   </div>
                   <div class="form-check">
                       <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                       <label class="form-check-label" for="flexRadioDefault2">
                           Private
                       </label>
                   </div>
               </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
