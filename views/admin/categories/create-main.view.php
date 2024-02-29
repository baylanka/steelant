    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Main Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
               <form action="<?= url('/admin/categories/main/store') ?>">
                   <div class="row">
                       <div class="col-12 d-flex justify-content-between mt-3">
                           <label for="name_de" class="align-items-center">Name (in Germany)</label>
                           <input name="name[de]" type="text" class="form-control w-50 align-items-center" placeholder="Category name" id="name_de"/>
                       </div>
                       <div class="col-12 d-flex justify-content-between mt-3">
                           <label>Name (in English)</label>
                           <input name="name[en]" type="text" class="form-control w-50" placeholder="Category name"/>
                       </div>
                       <div class="col-12 d-flex justify-content-between mt-3">
                           <label>Name (in French)</label>
                           <input name="name[fr]" type="text" class="form-control w-50" placeholder="Category name"/>
                       </div>

                       <hr class="mt-3">

                       <div class="col-12 d-flex justify-content-between mt-3">
                           <label for="basic-url" class="form-label align-middle">Visibility</label>

                           <div class="d-flex w-50 justify-content-evenly">
                           <div class="form-check">
                               <input class="form-check-input" type="radio" name="visibility" value="<?= \model\Category::PUBLISHED ?>"
                                      id="flexRadioDefault1">
                               <label class="form-check-label" for="flexRadioDefault1">
                                   Public
                               </label>
                           </div>
                           <div class="form-check">
                               <input class="form-check-input" type="radio" name="visibility" value="<?= \model\Category::PUBLISHED ?>"
                                      id="flexRadioDefault2" checked>
                               <label class="form-check-label" for="flexRadioDefault2">
                                   Private
                               </label>
                           </div>
                           </div>

                       </div>

                       <hr class="mt-3">


                       <div class="col-12 d-flex justify-content-between mt-3 row">

                           <div class="col-6">
                               <div class="input-group mb-3">
                                   <span class="input-group-text" id="basic-addon3">Thumbnail image</span>
                                   <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg" name="icon" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                               </div>
                           </div>

                           <div class="col-6">
                               <div class="input-group mb-3">
                                   <span class="input-group-text" id="basic-addon3">Banner image</span>
                                   <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg" name="icon" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                               </div>
                           </div>


                       </div>
                   </div>




               </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="store-btn">Create</button>
            </div>
        </div>
    </div>
    <script>
        $('button#store-btn').on('click', async function storeMainCategory(e){
            e.preventDefault();
            debugger
            const btn = $(this);
            const btnLabel = btn.text();
            loadButton(btn, "saving");
            const form = btn.closest('div.modal-dialog').find('form');
            try{
                let response = await makePostFileRequest(form);
                toast.success(response.message);
                console.log(response.data);
                //raise an event to close the modal
                const event = new CustomEvent('closeMainCategoryModal');
                document.dispatchEvent(event);
            }catch (err){
                toast.error(err);
            }finally {
                resetButton(btn, btnLabel);
            }
        });
    </script>
