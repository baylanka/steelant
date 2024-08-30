<?php
use helpers\pools\LanguagePool;
use model\ExceptionalRegion;
?>
<div class="modal-dialog" >
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Exceptional Regions</h1>
            &nbsp;
            &nbsp;
            <small class="text-small">
                <b>
                    (of
                    <?php $i=0; ?>
                    <?php foreach ($categoryTree as $category): ?>
                        <span class="text-primary"> <?= $category->getNameByLang(LanguagePool::ENGLISH()->getLabel()) ?></span>
                        <?= $i != (sizeof($categoryTree)-1) ? "  >>  " : '' ?>
                        <?php $i++; ?>
                    <?php endforeach;?>
                    )
                </b>
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
            <form action="<?= url('/admin/categories/exceptional-regions') ?>"  id="exceptional-regions-update-frm">
                <input type="hidden" name="category_id" value="<?=$category_id?>"/>
                <div class="row">
                    <div class="col-3 d-flex justify-content-between mt-3">
                        <label class="align-items-center"><?=LanguagePool::GERMANY()->getLabel()?></label>
                        <input class="form-check-input" type="checkbox" name="regions[]"
                               value="<?=LanguagePool::GERMANY()->getLabel()?>"
                               <?= ExceptionalRegion::existsBy([
                                        'leaf_category_id'=>$category_id,
                                        'region_lang_code'=>LanguagePool::GERMANY()->getLabel()
                                     ]) ? 'checked':''
                               ?>
                        >
                    </div>
                    <div class="col-3 d-flex justify-content-between mt-3">
                        <label class="align-items-center"><?=LanguagePool::FRENCH()->getLabel()?></label>
                        <input class="form-check-input" type="checkbox" name="regions[]"
                               value="<?= LanguagePool::FRENCH()->getLabel() ?>"
                            <?= ExceptionalRegion::existsBy([
                                'leaf_category_id'=>$category_id,
                                'region_lang_code'=>LanguagePool::FRENCH()->getLabel()
                            ]) ? 'checked':''
                            ?>
                        >
                    </div>
                    <div class="col-3 d-flex justify-content-between mt-3">
                        <label class="align-items-center"><?=LanguagePool::US_ENGLISH()->getLabel()?></label>
                        <input class="form-check-input" type="checkbox" name="regions[]"
                               value="<?= LanguagePool::US_ENGLISH()->getLabel() ?>"
                            <?= ExceptionalRegion::existsBy([
                                'leaf_category_id'=>$category_id,
                                'region_lang_code'=>LanguagePool::US_ENGLISH()->getLabel()
                            ]) ? 'checked':''
                            ?>
                        >
                    </div>
                    <div class="col-3 d-flex justify-content-between mt-3">
                        <label class="align-items-center"><?=LanguagePool::UK_ENGLISH()->getLabel()?></label>
                        <input class="form-check-input" type="checkbox" name="regions[]"
                               value="<?= LanguagePool::UK_ENGLISH()->getLabel() ?>"
                            <?= ExceptionalRegion::existsBy([
                                'leaf_category_id'=>$category_id,
                                'region_lang_code'=>LanguagePool::UK_ENGLISH()->getLabel()
                            ]) ? 'checked':''
                            ?>

                        >
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="update-btn">Update</button>
        </div>
    </div>
</div>
<script>
    $('button#update-btn').off('click');
    $('button#update-btn').on('click', async function updateExceptionalRegions(e){
        e.preventDefault();
        const btn = $(this);
        const btnLabel = btn.text();
        loadButton(btn, "updating ...");
        const form = btn.closest('div.modal-dialog').find('form');
        try{
            let response = await makePostFileRequest(form);
            toast.success(response.message);
            //raise an event to close the modal
            const event = new CustomEvent('updateExceptionalRegionsSuccessEvent', {
                detail: { category: response.data }
            });
            document.dispatchEvent(event);
        }catch (err){
            toast.error(err);
        }finally {
            resetButton(btn, btnLabel);
        }
    });
</script>
