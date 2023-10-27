<div class="input-dropzone position-relative w-100" style="aspect-ratio: 10/4">
    <input type="file" name="{{ $name }}" class="w-100 d-none" id="{{ $id }}" accept="image/*">
    <div class="dropzone-area border border-secondary w-100 position-absolute rounded d-flex align-items-center justify-content-center"
        style="aspect-ratio: 10/4; top: 0; left: 0; cursor:pointer;">
        <div id="{{ $customDropzoneId }}" class="px-3 w-100" style="height: 100%">
            <div class="dropzone-has-uploaded d-none justify-content-center align-items-center w-100"
                style="height: 100%">
                <i data-feather="check-circle" class="feather-icon text-success" style="transform: scale(2)"></i>
                <div class="text pl-4">
                    <h5 class="text-success">Your image has uploaded</h5>
                    <small>Drop files here or click to replace the image</small><br>
                    <small>Allowed *.jpeg *.jpg *.png *.gif</small>
                </div>
            </div>
            <div class="dropzone-hint w-100 d-flex justify-content-center align-items-center" style="height: 100%">
                <div class="icon">
                    <i data-feather="upload" class="feather-icon" style="transform: scale(2)"></i>
                </div>
                <div class="text pl-4">
                    <h5>Drop files here or click to upload</h5>
                    <small>Allowed *.jpeg *.jpg *.png *.gif</small>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="{{ $dropzonePreviewId }}" class="d-none justify-content-between align-items-center border mt-2 px-3">
    <div class="left-content d-flex align-items-center">
        <div>
            <img src="{{ asset($defaultImage) }}" alt="Uploaded Image"
                style="width: 4rem; height: 4rem; object-fit: contain" id="{{ $filePreviewId }}">
        </div>
        <div class="pl-2">
            <small id="{{ $namePreviewId }}">
                {{ $defaultName }}
            </small>
        </div>
    </div>
    <div class="right-content">
        <div>
            <small id="{{ $sizePreviewId }}">
                {{ $defaultSize }}
            </small>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(() => {
            const customDropzone = $("#{{ $customDropzoneId }}");
            const inputThumbnail = $("#{{ $id }}");
            const imageInfo = $("#{{ $dropzonePreviewId }}");
            const fileName = $("#{{ $namePreviewId }}");
            const fileSize = $("#{{ $sizePreviewId }}");
            const imagePreview = $("#{{ $filePreviewId }}");
            const dropzoneHint = $(".dropzone-hint");
            const dropzoneHasUploaded = $(".dropzone-has-uploaded");

            function displaySuccessDropzone() {
                dropzoneHint.removeClass("d-flex");
                dropzoneHint.addClass("d-none");
                dropzoneHasUploaded.addClass("d-flex");
                dropzoneHasUploaded.removeClass("d-none");
                imageInfo.removeClass("d-none");
                imageInfo.addClass("d-flex");
            }

            function hideSuccessDropzone() {
                dropzoneHint.removeClass("d-none");
                dropzoneHint.addClass("d-flex");
                dropzoneHasUploaded.addClass("d-none");
                dropzoneHasUploaded.removeClass("d-flex");
                imageInfo.removeClass("d-flex");
                imageInfo.addClass("d-none");
            }

            function validateAndDisplayFile(selectedFile) {
                if (selectedFile.size > 1 * 1024 * 1024) {
                    swal({
                        title: "Failed to upload image",
                        text: "Ukuran gambar melebihi 1 MB. Pilih gambar lain.",
                        icon: "error",
                        button: "ok"
                    });
                    return false;
                }

                if (!selectedFile.type.startsWith("image/")) {
                    swal({
                        title: "Failed to upload image",
                        text: "Hanya file gambar yang diizinkan. Pilih file gambar.",
                        icon: "error",
                        button: "ok"
                    });
                    return false;
                }

                return true;
            }

            function displayFileInfo(selectedFile) {
                fileName.text(selectedFile.name);
                var fileSizeInMB = selectedFile.size / (1024 * 1024);
                fileSize.text(fileSizeInMB.toFixed(2) + " MB");
            }

            function displayImagePreview(selectedFile) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.attr('src', e.target.result);
                    imagePreview.show();
                };
                reader.readAsDataURL(selectedFile);
            }

            customDropzone.click(function() {
                inputThumbnail.click();
            });

            inputThumbnail.change(function() {
                if (inputThumbnail[0].files.length > 0) {
                    displaySuccessDropzone();

                    var selectedFile = inputThumbnail[0].files[0];
                    if (validateAndDisplayFile(selectedFile)) {
                        displayFileInfo(selectedFile);
                        displayImagePreview(selectedFile);
                    } else {
                        inputThumbnail.val("");
                        hideSuccessDropzone();
                    }
                } else {
                    hideSuccessDropzone();
                }
            });

            customDropzone.on("dragover", function(e) {
                e.preventDefault();
                customDropzone.addClass("dragover");
            });

            customDropzone.on("dragleave", function() {
                customDropzone.removeClass("dragover");
            });

            customDropzone.on("drop", function(e) {
                e.preventDefault();
                customDropzone.removeClass("dragover");

                displaySuccessDropzone();

                var selectedFile = e.originalEvent.dataTransfer.files[0];
                if (validateAndDisplayFile(selectedFile)) {
                    displayFileInfo(selectedFile);
                    displayImagePreview(selectedFile);
                    inputThumbnail.prop('files', e.originalEvent.dataTransfer.files);
                }
            });
        });
    </script>
@endpush
