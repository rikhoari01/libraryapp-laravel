// Password Toggler
$('.pass-switch').click(function(){
      $('.pass-switch').toggleClass('fa-eye-slash')
      let pass = $('#password').attr('type');
      if(pass == 'password'){
            $('#password').attr('type', 'text');
      } else {
            $('#password').attr('type', 'password');
      }
})

// Gender Option
$('#gender').change(function(){
      $(this).removeClass('selectopt')
})

// Phone Input
$('#phone').keypress(function(event){
      var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                  return false;
            return true;
})
$('#edit_phone').keypress(function(event){
      var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                  return false;
            return true;
})
$('#adminPhone').keypress(function(event){
      var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                  return false;
            return true;
})

// Year Input
$('#publication_year').keypress(function(event){
      var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                  return false;
            return true;
})

// Show Sidebar
$('.btn-sidebar').click(function(){
      $('.sidebar').toggleClass("shows");
});

// Call Datatables
$('#newMember').DataTable();
$('#newBooks').DataTable();
$('#newBooksloan').DataTable();
$('#newBooksreturn').DataTable();
$('#membersTable').DataTable({"pageLength": 50});
$('#booksTable').DataTable({"pageLength": 50});
$('#latebooksTable').DataTable({"pageLength": 50});
$('#historyTable').DataTable({"pageLength": 50});
$('#adminTable').DataTable({"pageLength": 50});

// Scroll to top button appear
$(document).on('scroll', function() {
      let scrollDistance = $(this).scrollTop();
      if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
      } else {
            $('.scroll-to-top').fadeOut();
      }
});

// Add Admin
$('#btn-addUser').click(function(e){
      e.preventDefault();
      const role = $(this).data("role");
      $('#role').val(role);
});


// Preview User
$('.preview-user').click(function(e){
      e.preventDefault();
      const id = $(this).data("id");

      $.get('/user/'+id, function(data){
            $('#top-prev-id').text(data.data.user_id);
            $('#prev-user-id').text(data.data.user_id);
            $('#prev-name').text(data.data.name);
            $('#prev-email').text(data.data.email);
            $('#prev-birthdate').text(data.data.birthdate);
            $('#prev-phone').text(data.data.phone);
            $('#prev-gender').text(data.data.gender);
            $('#prev-address').text(data.data.address);
            if(data.data.profile){
                  $('.show-img').attr('src', '/storage/' + data.data.profile);
            }else{
                  $('.show-img').attr('src', '/images/default-profile.png')
            }

            $('#prev-user').modal('show');
      })
});

// Edit User
$('.edit-user').click(function(e){
      e.preventDefault();
      const id = $(this).data("id");
      const role = $(this).data("role");
      $('#edit_role').val(role);

      $.get('/user/'+id, function(data){
            $('#top-id').text(data.data.user_id);
            $('#edit_id').val(data.data.id);
            $('#edit_userid').val(data.data.user_id);
            $('#old_profile').val(data.data.profile);
            $('#edit_name').val(data.data.name);
            $('#edit_email').val(data.data.email);
            $('#edit_birthdate').val(data.data.birthdate);
            $('#edit_phone').val(data.data.phone);
            if(data.data.gender == 'Laki-Laki'){
                  $('#edit_gender').val('Laki-Laki');
            } else{
                  $('#edit_gender').val('Perempuan');
            }
            $('#edit_address').text(data.data.address);

            $('#edit-user').modal('show');
      });
});

// Delete User
$('.delete-user').click(function(){
      const id = $(this).data("id");
      const role = $(this).data("role");
      $('#del_id').val(id);
      $('#del_role').val(role);

      $.get('/user/'+id, function(data){
            $('#del_userid').val(data.data.user_id);
            $('#del_profile').val(data.data.profile);
            $('#no_anggota').text(data.data.user_id);

            $('#del-user').modal('show');
      })
});

// Preview Book
$('.preview-book').click(function(e){
      e.preventDefault();
      const id = $(this).data("id");

      $.get('/book/'+id, function(data){
            $('#top-prev-title').text(data.data.title);
            $('#prev-isbn').text(data.data.isbn);
            $('#prev-title').text(data.data.title);
            $('#prev-author').text(data.data.author);
            $('#prev-publisher').text(data.data.publisher);
            $('#prev-year').text(data.data.publication_year);
            if(data.data.status){
                  $('#prev-status').text('Tersedia');
                  $('#prev-status').addClass('text-success');
            }else{
                  $('#prev-status').text('Tidak Tersedia');
                  $('#prev-status').addClass('text-danger');
            }
            $('#prev-synopsis').text(data.data.synopsis);
            if(data.data.cover){
                  $('.show-img').attr('src', '/storage/' + data.data.cover);
            }else{
                  $('.show-img').attr('src', '/images/book-cover.jpg')
            }

            $('#prev-book').modal('show');
      })
});

// Edit Book
$('.edit-book').click(function(e){
      e.preventDefault();
      const id = $(this).data("id");

      $.get('/book/'+id, function(data){
            $('#edit_id').val(data.data.id);
            $('#old_cover').val(data.data.cover);
            $('#edit_isbn').val(data.data.isbn);
            $('#edit_title').val(data.data.title);
            $('#edit_author').val(data.data.author);
            $('#edit_publisher').val(data.data.publisher);
            $('#edit_publication_year').val(data.data.publication_year);
            $('#edit_synopsis').text(data.data.synopsis);

            $('#edit-book').modal('show');
      });
});

// Delete Book
$('.delete-book').click(function(){
      const id = $(this).data("id");
      $('#del_id').val(id);

      $.get('/book/'+id, function(data){
            $('#del_title').val(data.data.title);
            $('#del_cover').val(data.data.cover);
            $('#judul').text(data.data.title);

            $('#del-book').modal('show');
      })
});

// Borrow Book
$('#isbn').select2({
      dropdownParent: $('#add-circulation'),
      placeholder: 'ISBN Buku',
});
$('#isbn').change(function(){
      const id = $("#isbn").find(":selected").data("id");
      $('#id_book').val(id);

      $.get('/book/'+id, function(data){
            $("#title").val(data.data.title);
      });
      $('#title').prop('disabled', true);
});

$('#user_id').select2({
      dropdownParent: $('#add-circulation'),
      placeholder: 'ID Anggota',
});
$('#user_id').change(function(){
      const id = $("#user_id").find(":selected").data("id");
      $('#id_user').val(id);

      $.get('/user/'+id, function(data){
            $("#name").val(data.data.name);
      });
      $('#name').prop('disabled', true);
});

// Return Book
$('.return-book').click(function(){
      const id = $(this).data("id");
      const bookId = $(this).data("book");
      const name = $(this).data("name");
      const title = $(this).data("title");
      $('#return_id').val(id);
      $('#return_bookid').val(bookId);
      $('#return_title').val(title);
      $('.modal-body #user_id').text(name);
      $('.modal-body #title').text(title);

      $('#return-book').modal('show');
});

// Preview History
$('.preview-history').click(function(e){
      e.preventDefault();
      const id = $(this).data("id");
      const returndate = $(this).data("date");

      $.get('/history/'+id, function(data){
            const id_book = data.data.id_book;
            const id_user = data.data.id_user;
            
            $.get('/book/'+id_book, function(data){
                  $('#prev-isbn').text(data.data.isbn);
                  $('#prev-title').text(data.data.title);
                  $('#prev-author').text(data.data.author);
            })

            $.get('/user/'+id_user, function(data){
                  $('#prev-userid').text(data.data.user_id);
                  $('#prev-name').text(data.data.name);

                  $('#prev-history').modal('show');
            })
            
            $('#prev-borrowdate').text(data.data.borrow_date);
            $('#prev-returndate').text(returndate);
      })
});

// Admin Prev Img
function readURL(input) {
      if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                  $('.show-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
      }
}

$('#adminProfile').change(function(){
      readURL(this);
})

// Check Password
$('#newPassConfirm').change(function(){
      if($('#newPass').val() != $('#newPassConfirm').val()){
            $('#newPass').addClass('is-invalid');
            $('#newPassConfirm').addClass('is-invalid');
      }else if($('#newPass').val() == $('#newPassConfirm').val()){
            $('#newPass').removeClass('is-invalid');
            $('#newPassConfirm').removeClass('is-invalid');
      }
})

$('#oldPassConfirm').change(function(){
      if($('#oldPass').val() != $('#oldPassConfirm').val()){
            $('#oldPass').addClass('is-invalid');
            $('#oldPassConfirm').addClass('is-invalid');
      }else if($('#oldPass').val() == $('#oldPassConfirm').val()){
            $('#oldPass').removeClass('is-invalid');
            $('#oldPassConfirm').removeClass('is-invalid');
      }
})

// DATEPICKER
let borrow_date = new Date()
let return_date = borrow_date.getDate + 14;
$("#borrow_date").datepicker().datepicker("setDate", borrow_date);
$("#return_date").datepicker().datepicker("setDate", return_date);
$(".datepicker").datepicker().datepicker();