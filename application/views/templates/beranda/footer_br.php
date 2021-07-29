</div>
         </div>
        </section>
         <!-- == Car List Area End == -->

         <!-- Footer Bottom Start -->
       
         <!-- Footer Bottom End -->
         </section>
         <!--== Footer Area End ==-->

         <!--== Scroll Top Area Start ==-->
         <div class="scroll-top">
             <img src="<?= site_url('lain/front-end2/') ?>assets/img/scroll-top.png" alt="JSOFT">
         </div>
         <!--== Scroll Top Area End ==-->

         <!--=======================Javascript============================-->
         <!--=== Jquery Min Js ===-->
         <script src="<?= site_url('lain/front-end2/') ?>assets/js/jquery-3.2.1.min.js"></script>
         <!--=== Jquery Migrate Min Js ===-->
         <script src="<?= site_url('lain/front-end2/') ?>assets/js/jquery-migrate.min.js"></script>
         <!--=== Popper Min Js ===-->
         <script src="<?= site_url('lain/front-end2/') ?>assets/js/popper.min.js"></script>
         <!--=== Bootstrap Min Js ===-->
         <script src="<?= site_url('lain/front-end2/') ?>assets/js/bootstrap.min.js"></script>
         <!--=== Gijgo Min Js ===-->
         <script src="<?= site_url('lain/front-end2/') ?>assets/js/plugins/gijgo.js"></script>
         <!--=== Vegas Min Js ===-->
         <script src="<?= site_url('lain/front-end2/') ?>assets/js/plugins/vegas.min.js"></script>
         <!--=== Isotope Min Js ===-->
         <script src="<?= site_url('lain/front-end2/') ?>assets/js/plugins/isotope.min.js"></script>
         <!--=== Owl Caousel Min Js ===-->
         <script src="<?= site_url('lain/front-end2/') ?>assets/js/plugins/owl.carousel.min.js"></script>
         <!--=== Waypoint Min Js ===-->
         <script src="<?= site_url('lain/front-end2/') ?>assets/js/plugins/waypoints.min.js"></script>
         <!--=== CounTotop Min Js ===-->
         <script src="<?= site_url('lain/front-end2/') ?>assets/js/plugins/counterup.min.js"></script>
         <!--=== YtPlayer Min Js ===-->
         <script src="<?= site_url('lain/front-end2/') ?>assets/js/plugins/mb.YTPlayer.js"></script>
         <!--=== Magnific Popup Min Js ===-->
         <script src="<?= site_url('lain/front-end2/') ?>assets/js/plugins/magnific-popup.min.js"></script>
         <!--=== Slicknav Min Js ===-->
         <script src="<?= site_url('lain/front-end2/') ?>assets/js/plugins/slicknav.min.js"></script>

         <!--=== Main Js ===-->
         <script src="<?= site_url('lain/front-end2/') ?>assets/js/main.js"></script>

         <!-- Waktu Berjalan -->
         <script>
             window.setTimeout("waktu()", 1000);

             function waktu() {
                 var waktu = new Date();
                 setTimeout("waktu()", 1000);
                 document.getElementById("jam").innerHTML = waktu.getHours();
                 document.getElementById("menit").innerHTML = waktu.getMinutes();
                 document.getElementById("detik").innerHTML = waktu.getSeconds();
             }
         </script>

         <!-- Data Table Server Side -->
         <script src="<?= site_url('lain/front-end2/') ?>assets/js/jquery-3.5.1.js"></script>
         <script src="<?= site_url('lain/front-end2/') ?>assets/js/jquery.dataTables.min.js"></script>
         <script src="<?= site_url('lain/front-end2/') ?>assets/js/dataTables.material.min.js"></script>
         <script>
             $(document).ready(function() {
                 $('#tabel_data').DataTable({
                     autoWidth: false,
                     columnDefs: [{
                         targets: ['_all'],
                         className: 'mdc-data-table__cell'
                     }]
                 });
             });
         </script>

         <script src="<?= site_url('lain/back-end/') ?>assets/extra-libs/DataTables/datatables.min.js"></script>
         <script>
             /****************************************
              *       Basic Table                   *
              ****************************************/
             $('#zero_config').DataTable();
         </script>
         <script>
             /****************************************
              *       Basic Table                   *
              ****************************************/
             $('#zero_config2').DataTable();
         </script>
         <script>
             /****************************************
              *       Basic Table                   *
              ****************************************/
             $('#zero_config3').DataTable();
         </script>

         <!-- Peta USTJ -->
         <!-- <script>
             function initMap() {
                 var map = new google.maps.Map(document.getElementById('map-ustj'), {
                     center: new google.maps.LatLng(-2.605611, 140.657611),
                     zoom: 15
                 });
                 var infoWindow = new google.maps.InfoWindow;

                 downloadUrl('http://localhost/repository/mhs/home/data_xml', function(data) {
                     var xml = data.responseXML;
                     var markers = xml.documentElement.getElementsByTagName('marker');

                     Array.prototype.forEach.call(markers, function(markerElem) {
                         var id_pariwisata = markerElem.getAttribute('id_tempat');
                         var nama_tempat = markerElem.getAttribute('nama_tempat');
                         var alamat = markerElem.getAttribute('alamat');
                         var point = new google.maps.LatLng(
                             parseFloat(markerElem.getAttribute('lat')),
                             parseFloat(markerElem.getAttribute('long')));

                         var infowincontent = document.createElement('div');
                         var strong = document.createElement('strong');
                         strong.textContent = nama_tempat
                         infowincontent.appendChild(strong);
                         infowincontent.appendChild(document.createElement('br'));

                         var text = document.createElement('text');
                         text.textContent = alamat
                         infowincontent.appendChild(text);
                         var marker = new google.maps.Marker({
                             map: map,
                             position: point
                         });
                         marker.addListener('click', function() {
                             infoWindow.setContent(infowincontent);
                             infoWindow.open(map, marker);
                         });
                     });
                 });
             }

             function downloadUrl(url, callback) {
                 var request = window.ActiveXObject ?
                     new ActiveXObject('Microsoft.XMLHTTP') :
                     new XMLHttpRequest;
                 request.onreadystatechange = function() {
                     if (request.readyState == 4) {
                         request.onreadystatechange = doNothing;
                         callback(request, request.status);
                     }
                 };
                 request.open('GET', url, true);
                 request.send(null);
             }

             function doNothing() {}
         </script>
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKfieKjB1eqa0WTpb1E_BhQE-GYpqlns8&callback=initMap" async defer></script> -->
         </body>

         </html>