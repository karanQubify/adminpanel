var csrfToken = $('meta[name="csrf-token"]').attr('content');

$('.data-table').DataTable({
    "columnDefs": [
        { "orderable": false, "targets": -1 } // Disable sorting for the last column (action column)
    ]
});
ClassicEditor
    .create( document.querySelector( '#description' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );

$('.addTypeForm').validate({
    rules: {
        name: {
            required: true
        }
    },
    messages: {
        name: 'This field is required'
    },
    
    submitHandler: function(form) {
        form.submit();
    }
});

$('#icon').change(function() {
    var fileInput = $(this);
    var filePath = fileInput.val();
    var allowedExtensions = /(\.svg|\.png)$/i;

    // Check if the selected file has a valid extension
    if (!allowedExtensions.exec(filePath)) {
        // alert('12');
        fileInput.val(''); // Clear the file input
        
        $('#iconerror').html('Please choose an SVG or PNG file').show();
    } else {
        $('#iconerror').hide(); // Hide any previous error message

        var previewContainer = $('#iconPreview');
        previewContainer.empty();

        // Display image preview
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                // Create an image element with preview attributes
                var imgElement = $('<img>').attr({
                    'src': e.target.result,
                    'class': 'img-thumbnail mt-2',
                    'height': '100',
                    'width': '100'
                });

                // Append the image element to the preview container
                previewContainer.append(imgElement);
            };

            reader.readAsDataURL(this.files[0]); // Read the selected file
        }
    }
});

// service validations 
$('.addService').validate({
    rules: {
        name: {
            required: true
        },
        type: {
            required: true
        },
        description: {
            required: true
        },
        icon: {
            required: true,
            accept: "image/svg+xml, image/png"
        }
    },
    messages: {
        name: 'This field is required',
        type: {
            required: "This field is required"
        },
        description: {
            required: "This field is required"
        },
        icon: {
            required: "This field is required",
            accept: "Only SVG|PNG files are allowed"
        }
    },
    
    submitHandler: function(form) {
        form.submit();
    }
});

$('.editService').validate({
    rules: {
        name: {
            required: true
        },
        type: {
            required: true
        },
        description: {
            required: true
        },
        icon: {
            accept: "image/svg+xml, image/png"
        }
    },
    messages: {
        name: 'This field is required',
        type: {
            required: "This field is required"
        },
        description: {
            required: "This field is required"
        },
        icon: {
            accept: "Only SVG|PNG files are allowed"
        }
    },
    
    submitHandler: function(form) {
        form.submit();
    }
});
// technology validations 
$('.addTechnology').validate({
    rules: {
        name: {
            required: true
        },
        type: {
            required: true
        },
        description: {
            required: true
        },
        icon: {
            required: true,
            accept: "image/svg+xml, image/png"
        }
    },
    messages: {
        name: 'This field is required',
        type: 'This field is required',
        description: 'This field is required',
        icon: {
            required: 'This field is required',
            accept: 'Only SVG or PNG files are allowed'
        }
    },
    
    submitHandler: function(form) {
        form.submit();
    }
});

$('.editTechnology').validate({
    rules: {
        name: {
            required: true
        },
        type: {
            required: true
        },
        description: {
            required: true
        },
        icon: {
            accept: "image/svg+xml, image/png"
        }
    },
    messages: {
        name: 'This field is required',
        type: {
            required: "This field is required"
        },
        description: {
            required: "This field is required"
        },
        icon: {
            accept: "Only SVG|PNG files are allowed"
        }
    },
    
    submitHandler: function(form) {
        form.submit();
    }
});
// industry validations 
$('.addIndustry').validate({
    rules: {
        name: {
            required: true
        },
        type: {
            required: true
        },
        description: {
            required: true
        },
        icon: {
            required: true,
            accept: "image/svg+xml, image/png"
        }
    },
    messages: {
        name: 'This field is required',
        type: {
            required: "This field is required"
        },
        description: {
            required: "This field is required"
        },
        icon: {
            required: "This field is required",
            accept: "Only SVG|PNG files are allowed"
        }
    },
    
    submitHandler: function(form) {
        form.submit();
    }
});

$('.editIndustry').validate({
    rules: {
        name: {
            required: true
        },
        type: {
            required: true
        },
        description: {
            required: true
        },
        icon: {
            accept: "image/svg+xml, image/png"
        }
    },
    messages: {
        name: 'This field is required',
        type: {
            required: "This field is required"
        },
        description: {
            required: "This field is required"
        },
        icon: {
            accept: "Only SVG|PNG files are allowed"
        }
    },
    
    submitHandler: function(form) {
        form.submit();
    }
});

$(document).ready(function() {
    // Determine if the form is in "add" mode based on the presence of an ID field (e.g., serviceId)
    var isAddMode = ($('#serviceId').val() > 0);
    // Define the validation rules object
    var validationRules = {
        name: {
            required: true,
            messages: {
                required: 'Please enter a name'
            }
        },
        type: {
            required: true,
            messages: {
                required: 'Please select a type'
            }
        },
        description: {
            required: true,
            messages: {
                required: 'Please enter a description'
            }
        }
    };

    // Conditionally add validation rules for the icon field based on form mode
    if (!isAddMode) {
        // Add rules for "add" mode
        validationRules['icon'] = {
            required: true,
            accept: "image/svg+xml,image/png",
            messages: {
                required: 'Please choose an icon',
                accept: 'Only SVG or PNG files are allowed'
            }
        };
    } else {
        // Add rules for "edit" mode
        validationRules['icon'] = {
            accept: "image/svg+xml,image/png",
            messages: {
                accept: 'Only SVG or PNG files are allowed'
            }
        };
    }

    // Initialize form validation using jQuery validate plugin
    $('.ServiceForm').validate({
        rules: validationRules, // Apply the defined validation rules
        submitHandler: function(form) {
            form.submit(); // Submit the form if validation passes
        }
    });
});

// Delete Service Type 
$(document).on('click', '.delete_servicetype', function(){
    var typeId = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteServiceTypeConfirmed(typeId);
        }
    });
})

function deleteServiceTypeConfirmed(typeId){
    $.ajax({
        url: 'service_type/delete',
        method: 'DELETE',
        data: {
            id: typeId,
        },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {
            $('#confirmDelete').modal('hide');
            
            if(response === 'true'){
                $("tr#"+typeId).remove();
                toastr.success('Service Type Deleted Successfully');
            }else{
                toastr.error('This service already has data in Service List section.');
            }
            
            
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

// Delete Service delete_service

$(document).on('click', '.delete_service', function(){
    var typeId = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteServiceConfirmed(typeId);
        }
    });
})

function deleteServiceConfirmed(typeId){
    $.ajax({
        url: 'service/delete',
        method: 'DELETE',
        data: {
            id: typeId,
        },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {
            $('#confirmDelete').modal('hide');
            $("tr#"+typeId).remove();
            toastr.success('Service Deleted Successfully');
            
            
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

// Delete Technology Type 

$(document).on('click', '.delete_technologytype', function(){
    var typeId = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteTechnologyTypeConfirmed(typeId);
        }
    });
})

function deleteTechnologyTypeConfirmed(typeId){
    $.ajax({
        url: 'technology_type/delete',
        method: 'DELETE',
        data: {
            id: typeId,
        },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {
            $('#confirmDelete').modal('hide');
            if(response === 'true'){
                $("tr#"+typeId).remove();
                toastr.success('Technology Type Deleted Successfully');
            }else{
                toastr.error('This technology already has data in Technology List section.');
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

// delete technology 

$(document).on('click', '.delete_technology', function(){
    var typeId = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteTechnologyConfirmed(typeId);
        }
    });
})

function deleteTechnologyConfirmed(typeId){
    $.ajax({
        url: 'technology/delete',
        method: 'DELETE',
        data: {
            id: typeId,
        },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {
            $('#confirmDelete').modal('hide');
            $("tr#"+typeId).remove();
            toastr.success('Type Deleted Successfully');
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

// delete industry type 

$(document).on('click', '.delete_industrytype', function(){
    var typeId = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteindustryTypeConfirmed(typeId);
        }
    });
})

function deleteindustryTypeConfirmed(typeId){
    $.ajax({
        url: 'industry_type/delete',
        method: 'DELETE',
        data: {
            id: typeId,
        },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {
            $('#confirmDelete').modal('hide');
            if(response === 'true'){
                $("tr#"+typeId).remove();
                toastr.success('Industry Type Deleted Successfully');
            }else{
                toastr.error('This industry already has data in Industry List section.');
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

// delete industry 
   
$(document).on('click', '.delete_industry', function(){
    var typeId = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteIndustryConfirmed(typeId);
        }
    });
})

function deleteIndustryConfirmed(typeId){
    $.ajax({
        url: 'industry/delete',
        method: 'DELETE',
        data: {
            id: typeId,
        },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {
            $('#confirmDelete').modal('hide');
            $("tr#"+typeId).remove();
            toastr.success('Industry Deleted Successfully');
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}