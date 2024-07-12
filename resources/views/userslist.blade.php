<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
         body {
            background-color: #e5e5e5;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
           .search-container {
            margin: 50px 50px;
            }
             input#search-bar {
                 margin: 0 auto;
                 width: 100%;
                 height: 45px;
                 padding: 0 20px;
                 font-size: 1rem;
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
        
        .container-custom {
            margin: 50px 50px;
        }
        .box {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: left;
            margin-bottom: 20px;
            background-color: #ffffff;
        }
        .box .label-text {
            font-weight: bold;
            color: #afafaf;
        }
        .box .label-name{
            font-weight: bold;
            color: #7e7e7e;
        }
        .box .info-text {
            margin-bottom: 5px;
        }
        .label-search{
            font-weight: bold;
            color: #545454;
        }

    </style>
</head>
<body>

    <div class="search-container">
        <label class="label-search" for="firstName4">Search</label>
        <input type="text" id="search-bar" placeholder="Search Name/ Designation/ Department">
    </div>

    <div class="container container-custom">
        <div class="row justify-content-center" id="user-container">
            
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
                                <div class="col-md-3">
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
