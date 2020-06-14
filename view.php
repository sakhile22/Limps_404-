<?php
require_once './config.php';
include './header.php';
try {
   $sql = "SELECT * FROM offer WHERE 1 AND offer_id = :cid";
   $stmt = $DB->prepare($sql);
   $stmt->bindValue(":cid", intval($_GET["cid"]));
   
   $stmt->execute();
   $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}

?>

<div class="row">
  <ul class="breadcrumb">
      <li><a href="offers.php">Home</a></li>
      <li class="active">View Jobs</li>
    </ul>
</div>

  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">View Job</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" name="contact_form" id="contact_form" enctype="multipart/form-data" method="post">
          <fieldset>
              
          <div class="form-group">
              <label class="col-lg-4 control-label" for="profile_pic"><?php echo $results[0]["company_name"] ?></label>
              <div class="col-lg-5">
                <?php $pic = ($results[0]["company_logo"] <> "" ) ? $results[0]["company_logo"] : "no_avatar.png" ?>
                <a href="profile_pics/<?php echo $pic ?>" target="_blank"><img src="profile_pics/<?php echo $pic ?>" alt="" width="100" height="100" class="thumbnail" ></a>
              </div>
            </div>      
              
              
            <div class="form-group">
              <label class="col-lg-4 control-label" for="offer_title"><span class="required"></span>Offer title:</label>
              <div class="col-lg-5">
                  <h4 id="offer_title" name="offer_title"><?php echo $results[0]["offer_title"] ?></h4>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="location">Location:</label>
              <div class="col-lg-5">
                <h4 id="location"  name="location"><?php echo $results[0]["location"] ?></h4>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="due_date"><span class="required"></span>Due date:</label>
              <div class="col-lg-5">
                  <h4 id="due_date"  name="offer_closing_date"><?php echo $results[0]["offer_closing_date"] ?></h4>
              </div>
            </div>
            

            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="amount">Amount:</label>
              <div class="col-lg-5">
                  <h4 id="amount" style="float:left;"  name="salary_minimum">R<?php echo $results[0]["salary_minimum"] ?></h4><h4 style="float:left;">--</h4><h4 style="float:left;">To</h4><h4 style="float:left">--</h4><h4 name = "salary_maximum" style="float:left;">R<?php echo $results[0]["salary_maximum"] ?></h4>
                  <h4 style="float:left;"><?php echo $results[0]["salary_period"]?></h4>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="vacancydetails">Vacancy details:</label>
              <div class="col-lg-5">
               <span id="vacancydetails" name = "vacancy_details"><?php echo $results[0]["vacancy_details"] ?></span>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="requiredskills">Required skills:</label>
              <div class="col-lg-5">
                 <span id="requiredskilss" name="required_skills" ><?php echo $results[0]["required_skills"] ?></span>
              </div>
            </div>
            
           
            
            
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="requirements">Candidate Requirements:</label>
              <div class="col-lg-5">
                <span id="requirements" name="candidate_requirements"><?php echo $results[0]["candidate_requirements"] ?></span>
              </div>
            </div>
              
            <div class="form-group">
              <label class="col-lg-4 control-label" for="address"></label>
              <div class="col-lg-5">
              <a href="<?php echo $res["application_link"]; ?>" target="_blank"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span>Apply</button></a>&nbsp;
              </div>
            </div>
          </fieldset>
        </form>

      </div>
    </div>
  </div>
