<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Form Validation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style>
        html, body{
            min-height:100%;
            width:100%;
        }
        .msg-field:empty{
            display:none;
        }
        .input-loader {
            position: relative;
            right: 0.5em;
            top: -1.5em;
        }
        .spinner-border {
            --bs-spinner-width: 0.8rem;
            --bs-spinner-height: .8rem;
            --bs-spinner-border-width: 0.15em;
        }
    </style>
</head>
<body class="bg-dark bg-opacity-50">
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning bg-gradient">
        <div class="container">
            <a class="navbar-brand" href="./">Live Form Validation using PHP and Ajax</a>
            <div>
                <a href="#" class="text-light fw-bolder h6 text-decoration-none" target="_blank"> Enjoy sourcecode</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid px-5 my-3  pt-5">
        <div class="col-lg-6 col-md-8 col-sm-12 mx-auto">
            <div class="card rounded-0 shadow">
                <div class="card-body">
                    <div class="container-fluid">
                        <form id="memberForm">
                                <div class="alert msg-field alert-success mb-3 rounded-0 main_success"></div>
                                <div class="alert msg-field alert-danger mb-3 rounded-0 main_error"></div>
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control rounded-0" id="first_name" name="first_name" data-validate="true" autocomplete="off">
                                <div class="d-flex justify-content-end input-loader d-none">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <div class="alert p-1 msg-field alert-danger rounded-0 mt-2 err_msg"></div>
                            </div>
                            <div class="mb-3">
                                <label for="middle_name" class="form-label">Middle Name</label>
                                <input type="text" class="form-control rounded-0" id="middle_name" name="middle_name" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control rounded-0" id="last_name" name="last_name" data-validate="true" autocomplete="off">
                                <div class="d-flex justify-content-end input-loader d-none">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <div class="alert p-1 msg-field alert-danger rounded-0 mt-2 err_msg"></div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control rounded-0" id="email" name="email" data-validate="true" autocomplete="off">
                                <div class="d-flex justify-content-end input-loader d-none">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <div class="alert p-1 msg-field alert-danger rounded-0 mt-2 err_msg"></div>
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact #</label>
                                <input type="text" class="form-control rounded-0" id="contact" name="contact" data-validate="true" autocomplete="off">
                                <div class="d-flex justify-content-end input-loader d-none">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <div class="alert p-1 msg-field alert-danger rounded-0 mt-2 err_msg"></div>
                            </div>
                            <div class="mb-3 d-grid">
                                <button id="submit" type="submit" class="btn btn-warning btn-block rounded-pill">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="app.js"></script>
</body>
</html>