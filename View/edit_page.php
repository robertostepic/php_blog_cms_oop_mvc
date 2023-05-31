<?php require 'inc/header.php' ?>

<section class="py-5">
    <div class="container px-5">
        <?php require 'inc/notify.php' ?>
        <div class="bg-light rounded-4 py-5 px-4 px-md-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-window"></i></div>
                <h1 class="fw-bolder">Edit page</h1>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <form id="editPageForm" method="post">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="page-title" name="page-title" type="text" value="<?=$this->page->title?>" required />
                            <label for="page-title">Page title</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="page-description" name="page-description" type="text" value="<?=$this->page->description?>" />
                            <label for="page-description">Page description</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control" id="page-slug" name="page-slug" type="text" value="<?=$this->page->slug?>" />
                            <label for="page-slug">Page slug</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3 class="text-primary fw-bolder mb-2">Page body</h3>
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addImageModal" data-bs-whatever="@add">
                                <div class="d-inline-block bi bi-image me-2"></div>
                                Add image
                            </button>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" id="page-body" name="page-body" rows="10"><?=$this->page->body?></textarea>
                        </div>
                        <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" name="editPage" type="submit">Save changes</button></div>
                    </form>
                    <div class="d-grid justify-content-center py-3">
                        <a class="btn btn-light" href="?a=dashboard">Go back to dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add image modal -->
<div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="addImageModalLabel">Select or upload an image</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form id="addImageForm" method="post" action="?p=page&a=editPage&id=<?=$this->page->id?>" enctype="multipart/form-data">
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" role="switch" id="uploadSwitch" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="collapseSelect collapseUpload">
            <label class="form-check-label" for="uploadSwitch">Upload new image</label>
        </div>
        <div class="collapse show multi-collapse mb-3" id="collapseSelect">
            <label for="image-id" class="col-form-label">Select image:</label>
            <select class="form-select" aria-label="Select image" id="image-id" name="image-id">
                <option selected>Select image</option>
                <?php foreach ($this->images as $image): ?>
                <option value="<?=$image->id?>"><?=$image->source?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="collapse multi-collapse mb-3" id="collapseUpload">
            <label for="image-file" class="form-label">Upload image</label>
            <input class="form-control form-control" id="image-file" name="image-file" type="file">
        </div>
        </form>
        <strong>Note:</strong> Image will be added at the end of page body.
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="addImageForm" class="btn btn-primary" name="addImage">Add image</button>
    </div>
    </div>
</div>
</div>

<?php require 'inc/footer.php' ?>
