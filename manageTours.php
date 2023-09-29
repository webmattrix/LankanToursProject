<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Manage Tour</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/adminTemplate.css">
    <link rel="stylesheet" href="./css/manageTours.css" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div class="d-flex p-0">
                <?php
                include "./components/adminSidebar.php"; // change if you using other component like "guideSidebar.php"
                ?>

                <div class="d-flex w-100 flex-column" style="max-height: 100vh; min-height: 100vh; overflow-y: auto; background-color: #EBEBEB;">
                    <?php
                    include "./components/adminHeader.php"; // change if you using other component like "guideHeader.php"
                    ?>

                    <!-- Page Content / body content eka methanin liyanna -->
                    <div>

                        <div class="col-12">
                            <div class="row m-0 p-0">

                                <div class="col-12" style="background-color: #EBEBEB;">
                                    <div class="row">

                                        <!-- View Action Modal -->

                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <span style="font-family: 'Inter'; font-size: calc(0.67rem + 0.67vh); font-weight: 500;">Tour Plan Manage</span>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-12 pb-3 d-none d-lg-grid d-sm-none">
                                                            <div class="row justify-content-center">
                                                                <div class="col-11 p-3 " style="background-color: #E4E4E4; border-radius: 6px;">
                                                                    <div class="row pb-2 d-flex align-items-center">
                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div class="col-9">
                                                                                    <div class="row justify-content-center gap-3">
                                                                                        <div class="col-5">
                                                                                            <span style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Name Of Tour</span>
                                                                                            <input type="text" class="input-MTP">
                                                                                        </div>
                                                                                        <div class="col-5">
                                                                                            <span style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Duration</span>
                                                                                            <input type="text" class="input-MTP">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2 mt-3 pt-2">
                                                                                    <button class="addTourBtn1 col-12 d-grid">Add</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-4">
                                                                            <div class="row">
                                                                                <div class="col-9">
                                                                                    <div class="row justify-content-center gap-3">
                                                                                        <div class="col-5">
                                                                                            <span style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Day</span>
                                                                                            <select class="selectorModalMTP_ord" style="cursor: pointer;" aria-label="Default select example">
                                                                                                <option selected>Select</option>
                                                                                                <option value="1">1</option>
                                                                                                <option value="2">2</option>
                                                                                                <option value="3">3</option>
                                                                                                <option value="3">4</option>
                                                                                                <option value="3">5</option>
                                                                                                <option value="3">6</option>
                                                                                                <option value="3">7</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-5">
                                                                                            <span style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Visit Place</span>
                                                                                            <select class="selectorModalMTP_ord" style="cursor: pointer; overflow-y: scroll;" aria-label="Default select example">
                                                                                                <option selected>Select</option>
                                                                                                <option value="1">Colombo</option>
                                                                                                <option value="2">Kandy</option>
                                                                                                <option value="3">Galle</option>
                                                                                                <option value="3">Mount Lavinia</option>
                                                                                                <option value="3">Nuwara Eliya</option>
                                                                                                <option value="3">Anuradhapura</option>
                                                                                                <option value="3">Jaffna</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2 mt-3 pt-2">
                                                                                    <button class="addTourBtn1 col-12 d-grid">Add</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-4 pt-3">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-11 pt-4" style="overflow-y: auto; height: 231px; background-color: #FFFFFF; border-radius: 6px;">
                                                                                    <table class="table table-hover table-bordered" style="font-family: 'Inter'; border: 1px solid #A29A9A;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <div class="row">
                                                                                                    <th class="col-2 text-center"><span style="font-size: calc(0.58rem + 0.57vh); font-family: 'Inter'; border-radius: 8px;">Place</span></th>
                                                                                                    <th class="col- text-center"><span style="font-size: calc(0.58rem + 0.57vh); font-family: 'Inter'; border-radius: 8px;">Day</span></th>
                                                                                                    <th class="col-1 text-center"><span style="font-size: calc(0.58rem + 0.57vh); font-family: 'Inter'; border-radius: 8px;">Action</span></th>
                                                                                                </div>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <div class="row">
                                                                                                    <th class="col-2 text-center fw-normal" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">Kandy</th>
                                                                                                    <td class="col-3 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">2 Day</td>
                                                                                                    <td class="col-1 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">
                                                                                                        <button class="addTourBtnDel1 px-4 py-1">Delete</button>
                                                                                                    </td>
                                                                                                </div>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <div class="row">
                                                                                                    <th class="col-2 text-center fw-normal" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">Galle</th>
                                                                                                    <td class="col-3 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">1 Day</td>
                                                                                                    <td class="col-1 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">
                                                                                                        <button class="addTourBtnDel1 px-4 py-1">Delete</button>
                                                                                                    </td>
                                                                                                </div>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <div class="row">
                                                                                                    <th class="col-2 text-center fw-normal" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">Colombo</th>
                                                                                                    <td class="col-3 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">1 Day</td>
                                                                                                    <td class="col-1 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">
                                                                                                        <button class="addTourBtnDel1 px-4 py-1">Delete</button>
                                                                                                    </td>
                                                                                                </div>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-3">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-11">
                                                                                    <span style="font-size: calc(0.56rem + 0.57vh); font-family: 'Inter';">Description</span>
                                                                                    <textarea class="col-12 px-2 py-1" style="height: 130px; overflow-y: scroll; border: none; font-size: calc(0.54rem + 0.55vh);"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-4">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-11">
                                                                                    <div class="row">
                                                                                        <div class="col-6">
                                                                                            <div class="col-12" style="background-color: #FFFFFF;">
                                                                                                <div class="row justify-content-center p-3">
                                                                                                    <img src="./assets/img/manageTours_IMG/img_search.svg" class="search1">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-4 d-flex align-items-center offset-lg-1">
                                                                                            <button class="col-11 py-2 px-3 hoverUPBtn2">Update Tour</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- View Modal for small devices -->

                                                        <div class="col-12 pb-3 d-grid d-sm-grid d-lg-none">
                                                            <div class="row justify-content-center">
                                                                <div class="col-11" style="background-color: #E4E4E4; border-radius: 6px;">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="col-12">
                                                                                <span style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Name Of Tour</span>
                                                                                <input type="text" class="input-MTP">
                                                                            </div>
                                                                            <div class="col-12 mt-2">
                                                                                <span style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Duration</span>
                                                                                <input type="text" class="input-MTP">
                                                                            </div>
                                                                            <div class="col-6 mt-3 pt-2">
                                                                                <button class="addTourBtn1 col-12 d-grid">Add</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-4">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <span style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Day</span>
                                                                                    <select class="selectorModalMTP_ord" style="cursor: pointer;" aria-label="Default select example">
                                                                                        <option selected>Select</option>
                                                                                        <option value="1">1</option>
                                                                                        <option value="2">2</option>
                                                                                        <option value="3">3</option>
                                                                                        <option value="3">4</option>
                                                                                        <option value="3">5</option>
                                                                                        <option value="3">6</option>
                                                                                        <option value="3">7</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-12 mt-2">
                                                                                    <span style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Visit Place</span>
                                                                                    <select class="selectorModalMTP_ord" style="cursor: pointer; overflow-y: scroll;" aria-label="Default select example">
                                                                                        <option selected>Select</option>
                                                                                        <option value="1">Colombo</option>
                                                                                        <option value="2">Kandy</option>
                                                                                        <option value="3">Galle</option>
                                                                                        <option value="3">Mount Lavinia</option>
                                                                                        <option value="3">Nuwara Eliya</option>
                                                                                        <option value="3">Anuradhapura</option>
                                                                                        <option value="3">Jaffna</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-6 mt-3 pt-2">
                                                                                    <button class="addTourBtn1 col-12 d-grid">Add</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-4 pt-3">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-11 pt-4" style="overflow-y: auto; height: 231px; background-color: #FFFFFF; border-radius: 6px;">
                                                                                    <div class="row">
                                                                                        <table class="table table-hover table-bordered" style="font-family: 'Inter'; border: 1px solid #A29A9A;">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <div class="row">
                                                                                                        <th class="col-2 text-center"><span style="font-size: calc(0.58rem + 0.57vh); font-family: 'Inter'; border-radius: 8px;">Place</span></th>
                                                                                                        <th class="col-3 text-center"><span style="font-size: calc(0.58rem + 0.57vh); font-family: 'Inter'; border-radius: 8px;">Day</span></th>
                                                                                                        <th class="col-1 text-center"><span style="font-size: calc(0.58rem + 0.57vh); font-family: 'Inter'; border-radius: 8px;">Action</span></th>
                                                                                                    </div>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <div class="row">
                                                                                                        <th class="col-2 text-center fw-normal" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">Kandy</th>
                                                                                                        <td class="col-3 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">2 Day</td>
                                                                                                        <td class="col-1 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">
                                                                                                            <button class="addTourBtnDel1 px-4 py-1">Delete</button>
                                                                                                        </td>
                                                                                                    </div>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <div class="row">
                                                                                                        <th class="col-2 text-center fw-normal" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">Galle</th>
                                                                                                        <td class="col-3 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">1 Day</td>
                                                                                                        <td class="col-1 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">
                                                                                                            <button class="addTourBtnDel1 px-4 py-1">Delete</button>
                                                                                                        </td>
                                                                                                    </div>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <div class="row">
                                                                                                        <th class="col-2 text-center fw-normal" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">Colombo</th>
                                                                                                        <td class="col-3 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">1 Day</td>
                                                                                                        <td class="col-1 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">
                                                                                                            <button class="addTourBtnDel1 px-4 py-1">Delete</button>
                                                                                                        </td>
                                                                                                    </div>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="col-11" style="background-color: #E4E4E4; border-radius: 6px;">
                                                                    <div class="row pb-2">
                                                                        <div class="col-12">
                                                                            <div class="col-12">
                                                                                <span style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Name Of Tour</span>
                                                                                <input type="text" class="input-MTP">
                                                                            </div>
                                                                            <div class="col-12 mt-2">
                                                                                <span style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Duration</span>
                                                                                <input type="text" class="input-MTP">
                                                                            </div>
                                                                            <div class="col-6 mt-3 pt-2">
                                                                                <button class="addTourBtn1 col-12 d-grid">Add</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-4">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <span style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Day</span>
                                                                                    <select class="selectorModalMTP_ord" style="cursor: pointer;" aria-label="Default select example">
                                                                                        <option selected>Select</option>
                                                                                        <option value="1">1</option>
                                                                                        <option value="2">2</option>
                                                                                        <option value="3">3</option>
                                                                                        <option value="3">4</option>
                                                                                        <option value="3">5</option>
                                                                                        <option value="3">6</option>
                                                                                        <option value="3">7</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-12 mt-2">
                                                                                    <span style="font-family: 'Inter'; font-size: calc(0.58rem + 0.57vh); font-weight: 400;">Visit Place</span>
                                                                                    <select class="selectorModalMTP_ord" style="cursor: pointer; overflow-y: scroll;" aria-label="Default select example">
                                                                                        <option selected>Select</option>
                                                                                        <option value="1">Colombo</option>
                                                                                        <option value="2">Kandy</option>
                                                                                        <option value="3">Galle</option>
                                                                                        <option value="3">Mount Lavinia</option>
                                                                                        <option value="3">Nuwara Eliya</option>
                                                                                        <option value="3">Anuradhapura</option>
                                                                                        <option value="3">Jaffna</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-6 mt-3 pt-2">
                                                                                    <button class="addTourBtn1 col-12 d-grid">Add</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-4 pt-3">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-11 pt-4" style="overflow-y: auto; height: 231px; background-color: #FFFFFF; border-radius: 6px;">
                                                                                    <table class="table table-hover table-bordered" style="font-family: 'Inter'; border: 1px solid #A29A9A;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <div class="row">
                                                                                                    <th class="col-2 text-center"><span style="font-size: calc(0.58rem + 0.57vh); font-family: 'Inter'; border-radius: 8px;">Place</span></th>
                                                                                                    <th class="col-3 text-center"><span style="font-size: calc(0.58rem + 0.57vh); font-family: 'Inter'; border-radius: 8px;">Day</span></th>
                                                                                                    <th class="col-1 text-center"><span style="font-size: calc(0.58rem + 0.57vh); font-family: 'Inter'; border-radius: 8px;">Action</span></th>
                                                                                                </div>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <div class="row">
                                                                                                    <th class="col-2 text-center fw-normal" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">Kandy</th>
                                                                                                    <td class="col-3 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">2 Day</td>
                                                                                                    <td class="col-1 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">
                                                                                                        <button class="addTourBtnDel1 px-4 py-1">Delete</button>
                                                                                                    </td>
                                                                                                </div>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <div class="row">
                                                                                                    <th class="col-2 text-center fw-normal" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">Galle</th>
                                                                                                    <td class="col-3 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">1 Day</td>
                                                                                                    <td class="col-1 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">
                                                                                                        <button class="addTourBtnDel1 px-4 py-1">Delete</button>
                                                                                                    </td>
                                                                                                </div>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <div class="row">
                                                                                                    <th class="col-2 text-center fw-normal" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">Colombo</th>
                                                                                                    <td class="col-3 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">1 Day</td>
                                                                                                    <td class="col-1 text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; border-radius: 8px;">
                                                                                                        <button class="addTourBtnDel1 px-4 py-1">Delete</button>
                                                                                                    </td>
                                                                                                </div>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-3">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-11">
                                                                                    <span style="font-size: calc(0.56rem + 0.57vh); font-family: 'Inter';">Description</span>
                                                                                    <textarea class="col-12 px-2 py-1" style="height: 130px; overflow-y: scroll; border: none; font-size: calc(0.54rem + 0.55vh);"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-4">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-12">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="col-12" style="background-color: #FFFFFF;">
                                                                                                <div class="row justify-content-center p-3">
                                                                                                    <img src="./assets/img/manageTours_IMG/img_search.svg" class="search1">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 mt-3">
                                                                                            <div class="row justify-content-center">
                                                                                                <div class="col-6">
                                                                                                    <button class="col-12 py-2 px-3 hoverUPBtn2">Update Tour</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                        </div>

                                                        <!-- View Modal for small devices -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- View Action Modal -->

                                        <div class="col-12 my-3 my-lg-4">
                                            <div class="row justify-content-center gap-3">
                                                <div class="col-12 col-lg-5">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span style="font-family: 'Inter'; font-weight: 400; font-size: calc(0.62rem + 0.63vh);">Most Popular Tour Plan</span>
                                                            <img src="./assets/img/manageTours_IMG/Badulla.png" class="topTour1" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                            <div class="collapse" id="collapseExample">
                                                                <div class="card card-body" style="background-color: #FFFFFF; box-shadow: 0 2px 6px 0 rgba(0, 0, 0,0.4); border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;">
                                                                    <div class="col-12">
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-11">
                                                                                <div class="row" style="line-height: 0.3in;">
                                                                                    <div class="col-6">
                                                                                        <span style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">Tour Plan Name</span>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="row">
                                                                                            <span class="text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;">Luxury 10 Day</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <span style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">Tour Duration</span>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="row">
                                                                                            <span class="text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;">10 Day</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <span style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">View Count</span>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="row">
                                                                                            <span class="text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;">1320</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <span style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">Purchasing Count</span>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="row">
                                                                                            <span class="text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;">25</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <span style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">Rating</span>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="row">
                                                                                            <span class="text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;">
                                                                                                <iconify-icon icon="ic:baseline-star" style="color: #9A7C13;"></iconify-icon>
                                                                                                <iconify-icon icon="ic:baseline-star" style="color: #9A7C13;"></iconify-icon>
                                                                                                <iconify-icon icon="ic:baseline-star" style="color: #9A7C13;"></iconify-icon>
                                                                                                <iconify-icon icon="ic:baseline-star-half" style="color: #9A7C13;"></iconify-icon>
                                                                                                <iconify-icon icon="ic:baseline-star-border" style="color: #9A7C13;"></iconify-icon>
                                                                                            </span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-5">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span style="font-family: 'Inter'; font-weight: 400; font-size: calc(0.62rem + 0.63vh);">Least Popular Tour Plan</span>
                                                            <img src="./assets/img/manageTours_IMG/Dambulla.png" class="leastTour1" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1" alt="">
                                                            <div class="collapse" id="collapseExample1">
                                                                <div class="card card-body" style="background-color: #FFFFFF; box-shadow: 0 2px 6px 0 rgba(0, 0, 0,0.4); border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;">
                                                                    <div class="col-12">
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-11">
                                                                                <div class="row" style="line-height: 0.3in;">
                                                                                    <div class="col-6">
                                                                                        <span style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">Tour Plan Name</span>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="row">
                                                                                            <span class="text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;">7 Day Plan</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <span style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">Tour Duration</span>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="row">
                                                                                            <span class="text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;">7 Day</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <span style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">View Count</span>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="row">
                                                                                            <span class="text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;">425</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <span style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">Purchasing Count</span>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="row">
                                                                                            <span class="text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;">5</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <span style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 500;">Rating</span>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="row">
                                                                                            <span class="text-center" style="font-size: calc(0.58rem + 0.58vh); font-family: 'Inter'; font-weight: 400;">
                                                                                                <iconify-icon icon="ic:baseline-star" style="color: #9A7C13;"></iconify-icon>
                                                                                                <iconify-icon icon="ic:baseline-star-half" style="color: #9A7C13;"></iconify-icon>
                                                                                                <iconify-icon icon="ic:baseline-star-border" style="color: #9A7C13;"></iconify-icon>
                                                                                                <iconify-icon icon="ic:baseline-star-border" style="color: #9A7C13;"></iconify-icon>
                                                                                                <iconify-icon icon="ic:baseline-star-border" style="color: #9A7C13;"></iconify-icon>
                                                                                            </span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <div class="row">
                                                        <div class="col-12 mt-3 mt-lg-4 pt-5 px-5 pb-2" style="background-color: #FFFFFF; border-radius: 6px;">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-5 col-lg-5 my-sm-2 mt-lg-0">
                                                                    <span class="d-flex align-items-center"><iconify-icon icon="material-symbols:tune" class="fs-5"></iconify-icon> &nbsp;<span style="font-family: 'Segoe'; font-size: calc(0.64rem + 0.68vh);">Filter</span>
                                                                        <div class="col-lg-6 col-9 col-sm-9 ps-3">
                                                                            <select class="selectorMTP_ord" style="cursor: pointer;" aria-label="Default select example">
                                                                                <option selected>Select</option>
                                                                                <option value="1">One</option>
                                                                                <option value="2">Two</option>
                                                                                <option value="3">Three</option>
                                                                            </select>
                                                                        </div>
                                                                    </span>
                                                                </div>
                                                                <div class="col-12 col-lg-7 col-sm-7 my-sm-2 mt-3 mt-lg-0 mt-sm-0">
                                                                    <div class="row justify-content-end">
                                                                        <div class="col-12 col-lg-6 col-sm-8">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control textInputDet2" placeholder="search here...">
                                                                                <span class="input-group-text"><a href="#" style="color: #858585;"><iconify-icon icon="fe:search"></iconify-icon></a></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-lg-4 d-none d-lg-grid d-sm-none">
                                                                    <div class="row">
                                                                        <table class="table table-hover table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <div class="row">
                                                                                        <th class="col-2 text-center">Tour Plan</th>
                                                                                        <th class="col-2 text-center">Clicks</th>
                                                                                        <th class="col-2 text-center">Purchased Count</th>
                                                                                        <th class="col-3 text-center">Duration</th>
                                                                                        <th class="col-1 text-center">Action</th>
                                                                                    </div>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <div class="row">
                                                                                        <th class="col-2 text-center fw-normal">6 Day</th>
                                                                                        <td class="col-2 text-center">1260</td>
                                                                                        <td class="col-2 text-center">32</td>
                                                                                        <td class="col-3 text-center">2023/06/12 - 2023/06/14</td>
                                                                                        <td class="col-1 text-center">
                                                                                            <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                        </td>
                                                                                    </div>
                                                                                </tr>
                                                                                <tr>
                                                                                    <div class="row">
                                                                                        <th class="col-2 text-center fw-normal">11 Day</th>
                                                                                        <td class="col-2 text-center">1547</td>
                                                                                        <td class="col-2 text-center">24</td>
                                                                                        <td class="col-3 text-center">2023/06/12 - 2023/06/14</td>
                                                                                        <td class="col-1 text-center">
                                                                                            <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                        </td>
                                                                                    </div>
                                                                                </tr>
                                                                                <tr>
                                                                                    <div class="row">
                                                                                        <th class="col-2 text-center fw-normal">Luxury 5 Day</th>
                                                                                        <td class="col-2 text-center">465</td>
                                                                                        <td class="col-2 text-center">14</td>
                                                                                        <td class="col-3 text-center">2023/06/12 - 2023/06/14</td>
                                                                                        <td class="col-1 text-center">
                                                                                            <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                        </td>
                                                                                    </div>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-4 d-grid d-lg-none d-sm-grid">
                                                                    <div class="row">
                                                                        <table class="table table-hover table-bordered tableDetails2">
                                                                            <thead>
                                                                                <tr>
                                                                                    <div class="row">
                                                                                        <th class="col-2 text-center">Tour Plan</th>
                                                                                        <th class="col-3 text-center">Duration</th>
                                                                                        <th class="col-1 text-center">Action</th>
                                                                                    </div>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <div class="row">
                                                                                        <th class="col-2 text-center fw-normal">6 Day</th>
                                                                                        <td class="col-3 text-center">2023/06/12 - 2023/06/14</td>
                                                                                        <td class="col-1 text-center">
                                                                                            <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                        </td>
                                                                                    </div>
                                                                                </tr>
                                                                                <tr>
                                                                                    <div class="row">
                                                                                        <th class="col-2 text-center fw-normal">11 Day</th>
                                                                                        <td class="col-3 text-center">2023/06/12 - 2023/06/14</td>
                                                                                        <td class="col-1 text-center">
                                                                                            <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                        </td>
                                                                                    </div>
                                                                                </tr>
                                                                                <tr>
                                                                                    <div class="row">
                                                                                        <th class="col-2 text-center fw-normal">Luxury 5 Day</th>
                                                                                        <td class="col-3 text-center">2023/06/12 - 2023/06/14</td>
                                                                                        <td class="col-1 text-center">
                                                                                            <iconify-icon icon="bi:eye-fill" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                                                                                        </td>
                                                                                    </div>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-2 pt-1">
                                                                    <div class="row">
                                                                        <nav aria-label="Page navigation example">
                                                                            <ul class="pagination justify-content-center">
                                                                                <li class="page-item">
                                                                                    <a class="page-link" href="#" aria-label="Previous">
                                                                                        <span aria-hidden="true">&laquo;</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                                <li class="page-item">
                                                                                    <a class="page-link" href="#" aria-label="Next">
                                                                                        <span aria-hidden="true">&raquo;</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </nav>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- Page Content / body content eka methanin liyanna -->

                </div>

            </div>

        </div>
    </div>

    <script src="./js/adminTemplate.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>