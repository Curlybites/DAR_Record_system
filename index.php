<?php
include('components/header.php');

?>

<body>

    <!-- START OF NAVIGATION  -->
    <nav class="navbar shadow p-3 mb-4 bg-body-tertiary rounded mb-3 text-center">
        <div class="container-fluid row ">
            <a class="navbar-brand" href="index.php">
                <img src="./assets/DAR-LOGO.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Department of Agrarian Reform
            </a>
            <p class="col">Record Management System</p>
        </div>
    </nav>
    <!-- END OF NAVIGATION  -->

    <!-- START OF THE CONTAINER AND TABLE DIVISION -->
    <div class="container-fluid mt-2  p-5 mb-5 border ">
        <div class="container-fluid mb-5">
            <ul class="nav justify-content-end">

                <li class="nav-items m-1">
                    <button class="btn btn-outline-info ">
                        <i class="bi bi-paperclip"></i>
                        Import file
                    </button>
                </li>
                <li class="nav-items m-1">
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#insertmodal">
                        <i class="bi bi-plus-lg me-1"></i>
                        Add new Record
                    </button>
                </li>
                <li class="nav-items m-1">
                    <button class="btn btn-success ">
                        <i class="bi bi-file-earmark-excel"></i>
                        Excel
                    </button>
                </li>
                <li class="nav-items m-1">
                    <button class="btn btn-warning ">
                        <i class="bi bi-printer"></i>
                        Print
                    </button>
                </li>
            </ul>

        </div>

        <table id="example" class="table table-striped pt-3">
            <thead>
                <tr class="table-success">
                    <th>No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Middle Name</th>
                    <th>Purpose</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                // include ('functions/resultRecord.php');
                include('functions/all_functions_connect.php');
                while ($row = mysqli_fetch_array($result)) {


                ?>

                    <tr>
                        <td><?php echo $row['person_id']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['Last_name']; ?></td>
                        <td><?php echo $row['Middle_name']; ?></td>
                        <td><?php echo $row['purpose']; ?></td>
                        <td><?php echo $row['Added_att'] ?></td>
                        <td><?php
                            $time = $row['TimeIn'];
                            $time12 = date('h:i', strtotime($time));
                            $AM = date('A', strtotime($time));
                            echo $time12 . ' ' . $AM;
                            ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal">
                                <i class="bi bi-eye-fill"></i>
                            </button>

                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateModal">
                                <i class="bi bi-pen-fill"></i>
                            </button>

                            <a href="edit" class="btn btn-danger">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                        </td>
                    </tr>

                <?php } ?>

            </tbody>
            <tfoot>
                <tr>
                    <th>No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Middle Name</th>
                    <th>Purpose</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- END OF THE CONTAINER AND TABLE DIVISION -->


    <!-- MODAL SECTION -->
    <!-- insert modal -->
    <div class="modal fade" id="insertmodal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insertModalLabel">Add New Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="index.php" method="POST">
                    <div class="modal-body">
                        <input class="form-control" type="text" placeholder="First Name" aria-label="default input example" name="firstname" autocomplete="off">
                        <input class="form-control mt-2" type="text" placeholder="Last Name" aria-label="default input example" name="lastname" autocomplete="off">
                        <input class="form-control mt-2" type="text" placeholder="Middle Name" aria-label="default input example" name="middlename" autocomplete="off">

                        <div class="form-floating mt-3">
                            <textarea class="form-control " placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="purpose" autocomplete="off"></textarea>
                            <label for="floatingTextarea2">Purpose</label>
                        </div>

                        <div class="input-group date mt-3 " id="datePicker">
                            <span class="input-group-text bg-primary text-white">Date: </span>
                            <input type="date" id="dateInput" class="form-control" name="date">
                        </div>

                        <div class="input-group date mt-3 " id="">
                            <span class="input-group-text bg-primary text-white">Time: </span>
                            <input type="time" id="timeInput" class="form-control" name="timeIn">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-primary">Add new</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ENDING OF INSERT MODAL-->

    <!-- VIEW MODAL -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <div class="container-fluid">
                        <span class="mb-2 d-flex align-items-center justify-content-center">
                            <img src="./assets/DAR-LOGO.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                        </span>
                        <h5 class="modal-title text-center" id="exampleModalLabel">Department of Agrarian Reform</h5>
                        <p class="w-100 text-center">View Record</p>
                    </div>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">

                    <label for="name" class="d-flex flex-row justify-content-start">
                        <h6 class="font-weight-bold">Name: </h6>
                        <h6 class="ms-1">Anthony Esquilona</h6>
                    </label>

                    <label for="time-date">
                        <div class="date d-flex flex-row justify-content-start">
                            <h6 class="font-weight-bold">Date: </h6>
                            <h6 class="ms-1">9-02-2023</h6>
                        </div>
                        <div class="time d-flex flex-row justify-content-start">
                            <h6 class="font-weight-bold">Time: </h6>
                            <h6 class="ms-1">1:46 AM</h6>
                        </div>
                    </label>

                    <label for="purpose" class="d-flex flex-column justify-content-start">
                        <h6 class="">Purpose: </h6>
                        <textarea name="" id="" cols="20" rows="5" class="p-2" readonly>OJT</textarea>
                    </label>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ENDING OF VIEW MODAL -->

    <!-- UPDATE MODAL -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="index.php" method="POST">
                    <div class="modal-body">
                        <input class="form-control" type="text" placeholder="First Name" aria-label="default input example" name="firstname" autocomplete="off">
                        <input class="form-control mt-2" type="text" placeholder="Last Name" aria-label="default input example" name="lastname" autocomplete="off">
                        <input class="form-control mt-2" type="text" placeholder="Middle Name" aria-label="default input example" name="middlename" autocomplete="off">

                        <div class="form-floating mt-3">
                            <textarea class="form-control " placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="purpose" autocomplete="off"></textarea>
                            <label for="floatingTextarea2">Purpose</label>
                        </div>

                        <div class="input-group date mt-3 " id="datePicker">
                            <span class="input-group-text bg-primary text-white">Date: </span>
                            <input type="date" id="date" class="form-control" name="date">
                        </div>

                        <div class="input-group date mt-3 " id="">
                            <span class="input-group-text bg-primary text-white">Time: </span>
                            <input type="time" id="time" class="form-control" name="timeIn">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                <form/>
            </div>
        </div>
    </div>
    <!-- END OF UPDATE MODAL -->


    <!-- END OF MODAL SECTION -->


    <!-- INCLUDING PHP -->
    <?php


    // THIS PART IS FOR FOOTER
    include('components/footer.php');
    ?>