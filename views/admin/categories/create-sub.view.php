    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Sub Category</h1>
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

                       <div class="col-12 d-flex justify-content-between mt-3">
                           <label for="basic-url" class="form-label align-middle">Title</label>

                           <div class="d-flex w-50 justify-content-evenly">
                               <div class="form-check">
                                   <input class="form-check-input" type="radio" name="title" value="enable"
                                          id="flexRadioDefault1">
                                   <label class="form-check-label" for="flexRadioDefault1">
                                       Enable
                                   </label>
                               </div>
                               <div class="form-check">
                                   <input class="form-check-input" type="radio" name="title" value="disable"
                                          id="flexRadioDefault2" checked>
                                   <label class="form-check-label" for="flexRadioDefault2">
                                       Disable
                                   </label>
                               </div>
                           </div>

                       </div>
                       <small class="text-danger sub-cat-title-desc" style="width: 50%; font-size:0.7rem;">Enable Title: If this is your final category. Otherwise, the front page of this category will be without a title.</small>


                       <div class="col-12 d-flex justify-content-between mt-3 sub-cat-title-inp d-none">
                           <label for="name_de" class="align-items-center">Title (in Germany)</label>
                           <input name="name[de]" type="text" class="form-control w-50 align-items-center" placeholder="Category name" id="name_de"/>
                       </div>
                       <div class="col-12 d-flex justify-content-between mt-3 sub-cat-title-inp d-none">
                           <label>Title (in English)</label>
                           <input name="name[en]" type="text" class="form-control w-50" placeholder="Category name"/>
                       </div>
                       <div class="col-12 d-flex justify-content-between mt-3 sub-cat-title-inp d-none">
                           <label>Title (in French)</label>
                           <input name="name[fr]" type="text" class="form-control w-50" placeholder="Category name"/>
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


        $(document).on("change","[name=title]",function (){
            if($(this).val() === "enable"){
                $('.sub-cat-title-inp').removeClass("d-none");

                $('.sub-cat-title-desc').removeClass("text-danger");
                $('.sub-cat-title-desc').addClass("text-primary");
            }else{
                $('.sub-cat-title-inp').addClass("d-none");

                $('.sub-cat-title-desc').addClass("text-danger");
                $('.sub-cat-title-desc').removeClass("text-primary");
            }

        })




    </script>
