function addOrSelectGallery(id = null){
    // Design By

// - https://dribbble.com/shots/13992184-File-Uploader-Drag-Drop
if (id == null){
    id = '';
}
// Select Upload-Area
    const uploadArea = document.querySelector('#uploadArea'+id);
// Select Drop-Zoon Area
    const dropZoon = document.querySelector('#dropZoon'+id);
    console.log(dropZoon);

// Loading Text
    const loadingText = document.querySelector('#loadingText'+id);

// Slect File Input
    const fileInput = document.querySelector('#fileInput'+id);

// Select Preview Image
    const previewImage = document.querySelector('#previewImage'+id);

// File-Details Area
    const fileDetails = document.querySelector('#fileDetails'+id);

// Uploaded File
    const uploadedFile = document.querySelector('#uploadedFile'+id);

// Uploaded File Info
    const uploadedFileInfo = document.querySelector('#uploadedFileInfo'+id);

// Uploaded File  Name
    const uploadedFileName = document.querySelector('.uploaded-file__name');
    const inputFileName = document.querySelector('#FileName'+id);

// Uploaded File Icon
    const uploadedFileIconText = document.querySelector('.uploaded-file__icon-text');

// Uploaded File Counter
    const uploadedFileCounter = document.querySelector('.uploaded-file__counter');

// ToolTip Data
    const toolTipData = document.querySelector('.upload-area__tooltip-data');

// Images Types
    const imagesTypes = [
        "jpeg",
        "png",
    ];
// Append Images Types Array Inisde Tooltip Data
    toolTipData.innerHTML = [...imagesTypes].join(', .');

// When (drop-zoon) has (dragover) Event
    dropZoon.addEventListener('dragover', function (event) {
        // Prevent Default Behavior
        event.preventDefault();

        // Add Class (drop-zoon--over) On (drop-zoon)
        dropZoon.classList.add('drop-zoon--over');
    });

// When (drop-zoon) has (dragleave) Event
    dropZoon.addEventListener('dragleave', function (event) {
        // Remove Class (drop-zoon--over) from (drop-zoon)
        dropZoon.classList.remove('drop-zoon--over');
    });

// When (drop-zoon) has (drop) Event
    dropZoon.addEventListener('drop', function (event) {
        // Prevent Default Behavior
        event.preventDefault();

        // Remove Class (drop-zoon--over) from (drop-zoon)
        dropZoon.classList.remove('drop-zoon--over');

        // Select The Dropped File
        const file = event.dataTransfer.files[0];

        // Call Function uploadFile(), And Send To Her The Dropped File :)
        uploadFile(file);
    });

// When (drop-zoon) has (click) Event
    dropZoon.addEventListener('click', function (event) {
        // Click The (fileInput)
        fileInput.click();
    });

// When (fileInput) has (change) Event
    fileInput.addEventListener('change', function (event) {
        // Select The Chosen File
        const file = event.target.files[0];

        // Call Function uploadFile(), And Send To Her The Chosen File :)
        uploadFile(file);
    });

// Upload File Function
    function uploadFile(file) {
        // FileReader()
        const fileReader = new FileReader();
        // File Type
        const fileType = file.type;
        // File Size
        const fileSize = file.size;

        // If File Is Passed from the (File Validation) Function
        if (fileValidate(fileType, fileSize)) {
            // Add Class (drop-zoon--Uploaded) on (drop-zoon)
            dropZoon.classList.add('drop-zoon--Uploaded');

            // Show Loading-text
            loadingText.style.display = "block";
            // Hide Preview Image
            previewImage.style.display = 'none';

            // Remove Class (uploaded-file--open) From (uploadedFile)
            uploadedFile.classList.remove('uploaded-file--open');
            // Remove Class (uploaded-file__info--active) from (uploadedFileInfo)
            uploadedFileInfo.classList.remove('uploaded-file__info--active');

            // After File Reader Loaded
            fileReader.addEventListener('load', function () {
                // After Half Second
                setTimeout(function () {
                    // Add Class (upload-area--open) On (uploadArea)
                    uploadArea.classList.add('upload-area--open');

                    // Hide Loading-text (please-wait) Element
                    loadingText.style.display = "none";
                    // Show Preview Image
                    previewImage.style.display = 'block';

                    // Add Class (file-details--open) On (fileDetails)
                    fileDetails.classList.add('file-details--open');
                    // Add Class (uploaded-file--open) On (uploadedFile)
                    uploadedFile.classList.add('uploaded-file--open');
                    // Add Class (uploaded-file__info--active) On (uploadedFileInfo)
                    uploadedFileInfo.classList.add('uploaded-file__info--active');
                }, 500); // 0.5s

                // Add The (fileReader) Result Inside (previewImage) Source
                previewImage.setAttribute('src', fileReader.result);
                // document.getElementById('preview_gallery').setAttribute('src', fileReader.result);
                // Add File Name Inside Uploaded File Name
                const KBSize = Math.round(file.size/1024);

                if(KBSize >= 1024)
                {
                    const MBSize = Math.round(KBSize/1024);
                    uploadedFileName.innerHTML = MBSize + 'MB'
                }
                else{
                    uploadedFileName.innerHTML = KBSize + 'KB' ;
                }

                getFileDetails(file);
                $('#changeDetails'+id).show();
                $('#saveFileButton'+id).show();
                showGallery(file);
                // Call Function progressMove();
                document.getElementById('preview_gallery'+id).setAttribute('src', fileReader.result);
                document.getElementById('uploadjsimage'+id).setAttribute('checked','checked');
                progressMove();
            });

            // Read (file) As Data Url
            fileReader.readAsDataURL(file);
        } else { // Else

            this; // (this) Represent The fileValidate(fileType, fileSize) Function

        };
    };

// Progress Counter Increase Function
    function progressMove() {
        // Counter Start
        let counter = 0;

        // After 600ms
        setTimeout(() => {
            // Every 100ms
            let counterIncrease = setInterval(() => {
                // If (counter) is equle 100
                if (counter === 100) {
                    // Stop (Counter Increase)
                    clearInterval(counterIncrease);
                } else { // Else
                    // plus 10 on counter
                    counter = counter + 10;
                    // add (counter) vlaue inisde (uploadedFileCounter)
                    uploadedFileCounter.innerHTML = `${counter}%`
                }
            }, 100);
        }, 600);
    };


// Simple File Validate Function
    function fileValidate(fileType, fileSize) {
        // File Type Validation
        let isImage = imagesTypes.filter((type) => fileType.indexOf(`image/${type}`) !== -1);

        // If The Uploaded File Type Is 'jpeg'
        if (isImage[0] === 'jpeg') {
            // Add Inisde (uploadedFileIconText) The (jpg) Value
            uploadedFileIconText.innerHTML = 'jpg';
        } else { // else
            // Add Inisde (uploadedFileIconText) The Uploaded File Type
            uploadedFileIconText.innerHTML = isImage[0];
        };

        // If The Uploaded File Is An Image
        if (isImage.length !== 0) {
            // Check, If File Size Is 2MB or Less
            if (fileSize <= 2000000) { // 2MB :)
                return true;
            } else { // Else File Size
                return alert('Please Your File Should be 2 Megabytes or Less');
            };
        } else { // Else File Type
            return alert('Please make sure to upload An Image File Type');
        };
    };

// :)

    function showGallery(file){
        var filename = getFileDetails(file);
        var text1 = "<div class=\"file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in\">\n" +
            "                                    <div class=\"absolute left-0 top-0 mt-3 ml-3\">\n" +
            "                                        <input class=\"input border border-gray-500 marked\"  value=\"uploadedImage\" name=\"selectedImage\" id=\"uploadjsimage"+id+"\" type=\"radio\">\n" +
            "                                    </div>\n" +
            "                                    <a href=\"\" class=\"  mx-auto my-auto\">\n" +
            "                                        <div class=\"file__icon__gallerys m-auto justify-center items-center\">\n" +
            "                                            <img  class=\"gallery_image\"  id=\"preview_gallery"+id+"\">\n" +
            "                                        </div>\n" +
            "                                    </a>\n" +
            "                                    <a href=\"\" class=\"block font-medium mt-4 text-center truncate\">"+filename+"</a>\n" +
            "                                    <div class=\"text-gray-600 text-xs text-center\"></div>\n" +
            "                                    <a class=\" w-5 h-5 block tooltip \" title=\"15 محصول ثبت شده  در سایت\" data-theme=\"dark\" href=\"javascript:;\"> <i data-feather=\"activity\" class=\"w-5 h-5 text-gray-500\"></i> </a>\n" +
            "                                    <div class=\"absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto\">\n" +
            "                                        <a class=\"dropdown-toggle w-5 h-5 block\" href=\"javascript:;\"> <i data-feather=\"more-vertical\" class=\"w-5 h-5 text-gray-500\"></i> </a>\n" +
            "                                        <div class=\"dropdown-box mt-5 absolute w-40 top-0 right-0 z-10\">\n" +
            "                                            <div class=\"dropdown-box__content box p-2\">\n" +
            "                                                <a href=\"javascript:;\" data-toggle=\"modal\" id=\"submit\" data-target=\"#galleryDelete{{$gallery->id}}\" class=\"flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md\"> <i data-feather=\"trash\" class=\"w-4 h-4 mr-2\"></i> حذف </a>\n" +
            "                                                <a href=\"javascript:;\" data-toggle=\"modal\" id=\"submit\" data-target=\"#galleryEdit{{$gallery->id}}\" class=\"flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md\"> <i data-feather=\"trash\" class=\"w-4 h-4 mr-2\"></i> ویرایش 2 </a>\n" +
            "                                            </div>\n" +
            "                                        </div>\n" +
            "                                    </div>\n" +
            "                                </div>";
        // document.getElementById('showGallery').appendChild(text1);
        const para = document.createElement("div");
        para.classList.add("intro-y", "col-span-6", "sm:col-span-4", "md:col-span-4", "xxl:col-span-3");
        const node = document.createTextNode("This is new.");
        para.innerHTML = text1;
        const element = document.getElementById("showGallery"+id);

        element.insertBefore(para,element.firstChild);
        console.log('hi');
    }
    function getFileDetails(file){
        const fileType = file.type.split("/");
        const removetype = '.'+fileType[1];
        var filename = file.name.replace(removetype,'');
        if(removetype == '.jpeg'){
            filename = file.name.replace('.jpg','');
        }
        // console.log(file);
        inputFileName.value = filename;
        return filename;
    }

}
