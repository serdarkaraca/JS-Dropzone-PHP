# JS-Dropzone PHP

## JS Dropzone eklentisini PHP ile kullanım örneği Türkçe olarak anlatılmıştır.

#### İlk olarak yapılması gerekenler

 Html sayfamıza bir tane div veya her hangi bir form elementi ekliyoruz,
 eklediğimiz bu form elementine dropzone eklentisini entegre edeceğiz.
 
    <div class="dropzone"></div>
 
 Bu element div olmak zorunda değil, her hangi bir form elementi de olabilir.
 
 Aynı html sayfaya dropzone css ve js dosyalarını da ekliyoruz.
 
     <link rel="stylesheet" href="assets/dropzone.css">     
     <script src="assets/dropzone.js"></script>
 
 Aynı html sayfa üzerinde 'script' etikleri arasında sırasıyla aşağıdaki adımları uygulayabiliriz veya yeni bir JS dosyası oluşturup bu html sayfaya çağırabilirsiniz.
 
 Bu örnekte html sayfa üzerinde yapıldı.
 
     <script>
         Dropzone.autoDiscover = false;
         $(document).ready(function () {
             var _dz = new Dropzone(".dropzone", {
                 autoProcessQueue: true, // Dosyalar dropzone alanına bırakıldığı anda yüklemeye başlar, false olarak ayarlanırsa elle tetiklemek gerekir.
                 parallelUploads: 10, // Aynı anda kaç dosya yüklenecek. Her hangi bir ayar belirtilmezse varsayılan 2'dir.
                 timeout:0,
                 dictDefaultMessage:'Yüklemek istediğiniz dosyaları buraya bırakın',
                 dictFallbackMessage: "Tarayıcınız sürükle bırak yüklemelerini desteklemiyor",
                 dictFileTooBig: "Dosya boyutu çok büyük ({{filesize}} Mb). Yükleyebileceğiniz en büyük dosya boyutu: {{maxFilesize}} Mb.",
                 dictInvalidFileType: "Bu tür dosyaları yükleyemezsiniz",
                 dictResponseError: "Sunucu hatası. Hata kodu : {{statusCode}}",
                 dictCancelUpload: "Yüklemeyi İptal Et",
                 dictUploadCanceled: "Yükleme iptal edildi",
                 dictCancelUploadConfirmation: "Bu yüklemeyip iptal etmek istediğinizden emin misiniz ?",
                 dictRemoveFile: "Dosyayı Sil",
                 dictMaxFilesExceeded: "Başka dosya yükleyemezsiniz.",
                 maxFilesize: 512, // MB
                 url:'uploadfile.php', // Yükleme işlemini yapacak sunucu dosyası
                 removedfile: function(file) {
                     //var name = file.name;
                     var _ref;
                     return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                 },
                 success: function (file, response, data) {
                     console.log(file.upload.filename);
                     console.log(file.size);
                     _dz.removeFile(file); //Upload edilen dosya dropzone alanından silinir.
                 },
                 error: function (file, response) {
                     file.previewElement.classList.add("dz-error");
                 }
             });
         });
     
     </script>
     
     
     
     
     
 ## Uploadfile.php
 
     
    <?php
        
    $target_dir = "UploadedFiles/";
    
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
        $status = 1;
    }
    
    
    ?>
     
