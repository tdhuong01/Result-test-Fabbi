<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel='stylesheet' id='custom-css' href='css/main.css' type='text/css' media='all' />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 col-12 col-xl-6  offset-md-3 offset-xl-3">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-step1-tab" data-bs-toggle="pill"
                            data-bs-target="#step1" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true" disabled>Step 1</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-step2-tab" data-bs-toggle="pill" data-bs-target="#step2"
                            type="button" role="tab" aria-controls="pills-profile" aria-selected="false" disabled>Step
                            2</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-step3-tab" data-bs-toggle="pill" data-bs-target="#step3"
                            type="button" role="tab" aria-controls="pills-contact" aria-selected="false" disabled>Step
                            3</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-review-tab" data-bs-toggle="pill" data-bs-target="#review"
                            type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false" disabled>Review</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="step1" role="tabpanel"
                        aria-labelledby="pills-step1-tab">
                        <div class="content-tab">
                            <label for="">Please select a meal</label>
                            <select name="" id="meal" required>
                                <option value="">Choose a meal</option>
                                @foreach ($meals as $meal)
                                   <option value="{{$meal}}">{{ucfirst($meal)}}</option>
                                @endforeach
                                
                            </select>
                            <label for="">Please enter number of people</label>
                            <input type="number" name="" id="people" min="1" value="1" max="10" required>
                        </div>
                        <div class="group-btn">
                            <button class="btn"></button>
                            <button class="btn btn-primary next next-tab1" disabled>Next</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="pills-step2-tab">
                        <div class="content-tab">
                            <label for="">Please select a Restaurant</label>
                            <select name="" id="restaurants">
                            </select>
                        </div>
                        <div class="group-btn">
                            <button class="btn btn-primary prev">Previous</button>
                            <button class="btn btn-primary next next-tab2" disabled>Next</button>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="pills-step3-tab">
                        <div class="content-tab">
                            <div style="display:flex;justify-content:space-between;">
                                <div>
                                    <label for="">Please select a Dish</label>
                                    <select name="" id="dishes">
                                    </select>
                                    <i class="error_dish"></i>
                                </div>
                                <div>
                                    <label for="">Please enter no. of servings</label>
                                    <input type="number" name="" id="servings" min="1"  value="1">
                                    <p><i>(Respective serving should be greater or equal to the number of people)</i></p>
                                </div>
                            </div>
                            <button type="button" class="btn btn-default" onclick="addDishes()"><i class="fa-solid fa-circle-plus"></i></button>
                            <div class="pre-order">
                                
                            </div>
                        </div>
                        <div class="group-btn">
                            <button class="btn btn-primary prev">Previous</button>
                            <button class="btn btn-primary next  next-tab3"  disabled>Next</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="pills-review-tab">
                        <div class="result">
                            <label for="">Meal</label>
                            <label for="" class="result_meal"></label>
                        </div>
                        <div class="result">
                            <label for="">No. of. People</label>
                            <label for="" class="result_people">1</label>
                        </div>
                        <div class="result">
                            <label for="">Restaurant</label>
                            <label for="" class="result_restaurant"></label>
                        </div>
                        <div class="result">
                            <label for="">Dishes</label>
                            <div class="pre-order"></div>
                        </div>  
                        <div class="group-btn">
                            <button class="btn btn-primary prev">Previous</button>
                            <button class="btn btn-success submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
