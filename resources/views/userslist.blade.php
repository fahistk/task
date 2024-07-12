<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
<style>
body {
    background-color: #e5e5e5;
    font-family: Arial, sans-serif;
}
.search-container {
width:100%;
}
 input#search-bar {
     margin: 0 auto;
     width: 100%;
     height: 45px;
     font-size: 1rem;
     padding: 20px;
     border: none;
     outline: none;
     background-color: #f2f2f2;
    box-shadow: 0px 0px 15px #cccccc !important;
}
 input#search-bar:focus {
     border: 1px solid #008abf;
     transition: 0.35s ease;
     color: #404242;
}
 input#search-bar:focus::-webkit-input-placeholder {
     transition: opacity 0.45s ease;
     opacity: 0;
}
 input#search-bar:focus::-moz-placeholder {
     transition: opacity 0.45s ease;
     opacity: 0;
}
 input#search-bar:focus:-ms-placeholder {
     transition: opacity 0.45s ease;
     opacity: 0;
}
.label-name{
    font-weight: 600;
     color: #4e4e4e;
}
.box {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    text-align: left;
    margin-bottom: 20px;
    background-color: #ffffff;
    min-height: 150px;
}
</style>
</head>

<body>

    <div class="container-fluid">
        <div class="col-lg-12 mt-4">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="search-container">
                        <label class="label-search" for="firstName4">Search</label>
                        <input type="text" id="search-bar" placeholder="Search Name/ Designation/ Department">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-4">
            <div class="row"  id="user-container">

                

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        function fetchUserData(searchValue = '') {
            $.ajax({
                url: 'userdetails',
                method: 'GET',
                data: { search: searchValue },
                success: function(response) {
                    const container = $('#user-container');
                    container.empty();
                    if (response.length === 0) {
                        container.append('<div class="col-md-12"><div class="alert alert-warning" role="alert">No results found</div></div>');
                    } else {
                        response.forEach(user => {
                            const userBox = `
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                    <div class="box">
                                        <div class="info-text">
                                            <span class="label-name">${user.username}</span>
                                        </div>
                                        <div class="info-text">
                                            <span class="label-text">${user.departmentname}</span> 
                                        </div>
                                        <div class="info-text">
                                            <span class="label-text">${user.designationsname}</span> 
                                        </div>
                                    </div>
                                </div>
                            `;
                            container.append(userBox);
                        });
                    }
                },
                error: function() {
                    const container = $('#user-container');
                    container.empty();
                    container.append('<div class="col-md-12"><div class="alert alert-danger" role="alert">Error fetching data</div></div>');
                }
            });
        }

        fetchUserData();

        $('#search-bar').on('input', function() {
            const searchValue = $(this).val();
            const container = $('#user-container');
            container.empty();
            container.append('<div class="col-md-12"><div class="alert alert-info" role="alert">Searching...</div></div>');
            fetchUserData(searchValue);
        });
    });
</script>
</body>

</html>
