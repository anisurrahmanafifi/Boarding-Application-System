<?php include_once'header.php' ?>


<form>
<div class="row">
    <div class="form-group col-md-6">
        <div class="col sm-1 mt-2 mb-2">
            <label for="">তারিখ</label>
            <input type="date" name="date" id="date" class="form-control" placeholder="" value="<?php echo date("Y-m-d"); ?>" disabled required>
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="col mt-2 mb-2">
            <label for="">ফর্ম নম্বর</label>
            <input type="number" name="form_no" id="form_no" class="form-control" placeholder="" value="3" disabled required>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        <div class="col sm-1 mt-2 mb-2">
            <label for="">পূর্ণনাম</label>
            <input type="text" name="full_name" id="full_name" class="form-control" placeholder="পূর্ণনাম" required>
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="col mt-2 mb-2">
            <label for="">দাখিলা</label>
            <input type="text" name="dakhila" id="dakhila" class="form-control" placeholder="দাখিলা" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col mt-2 mb-2">
    <label for="">মারহালা</label>
    <select name="marhala" id="marhala" class="form-select" required>
    <option selected hidden>মারহালা নির্বাচন করুন</option>
    <option value="ফজিলত - ১ম বর্ষ">ফজিলত - ১ম বর্ষ</option>
    <option value="সানাবিয়্যাহ উলয়্যা">সানাবিয়্যাহ উলয়্যা</option>
    <option value="সানাবিয়্যাহ আম্মাহ - ২য় বর্ষ">সানাবিয়্যাহ আম্মাহ - ২য় বর্ষ</option>
    <option value="সানাবিয়্যাহ আম্মাহ - ১ম বর্ষ">সানাবিয়্যাহ আম্মাহ - ১ম বর্ষ</option>
    <option value="মুতাওয়াসসিতাহ - ২য় বর্ষ">মুতাওয়াসসিতাহ - ২য় বর্ষ</option>
    <option value="মুতাওয়াসসিতাহ - ১ম বর্ষ">মুতাওয়াসসিতাহ - ১ম বর্ষ</option>
    <option value="ইবতেদাইয়্যাহ - ২য় বর্ষ">ইবতেদাইয়্যাহ - ২য় বর্ষ</option>
    <option value="ইবতেদাইয়্যাহ - ১ম বর্ষ">ইবতেদাইয়্যাহ - ১ম বর্ষ</option>
    <option value="হিফজুল কুরআন">হিফজুল কুরআন</option>
    <option value="নুরানি - ৩য় শ্রেণি">নুরানি - ৩য় শ্রেণি</option>
    <option value="নুরানি - ২য় শ্রেণি">নুরানি - ২য় শ্রেণি</option>
    <option value="নুরানি - ১ম শ্রেণি">নুরানি - ১ম শ্রেণি</option>
    </select>
    </div>
    <div class="col mt-2 mb-2">
    <label for="">খোরাকি</label>
    <input type="number" name="khoraki" id="khoraki" class="form-control" placeholder="সুপারিশকৃত খোরাকি">
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
    </div>
    <div class="form-group col-md-6">
        <div class="col mt-2 mb-2">
        <button type="button" name="submit" id="submit" class="btn btnbutton1">আবেদন করুন</button>
        </div>
    </div>
</div>
</form>
<div id="response"></div>
<script>
  $(document).ready(function(){
    $("#submit").click(function(){
      var date = $("#date").val();
      var form_no = $("#form_no").val();
      var full_name = $("#full_name").val();
      var dakhila = $("#dakhila").val();
      var marhala = $("#marhala").val();
      var khoraki = $("#khoraki").val();

      if(date == "" || form_no == "" || full_name == "" || dakhila == "" || marhala == "" || khoraki == "" || ){
        $('#response').fadeIn();
        $('#response').removeClass('success-msg').addClass('error-msg').html('All fields are required.');
      }else{
       // $('#response').html($('#submit_form').serialize());
        $.ajax({
          url: "save-form.php",
          type: "POST",
          data : $('#submit_form').serialize(),
          beforesend: function(){
            $('#response').fadeIn();
            $('#response').removeClass('success-msg error-msg').addClass('process-msg').html('Loading response...');
          },
          success: function(data){
            $('#submit_form').trigger("reset");
            $('#response').fadeIn();
            $('#response').removeClass('error-msg').addClass('success-msg').html(data);
            setTimeout(function(){
              $('#response').fadeOut("slow");
            },4000);
          }
        });
      }
    });
  });
</script>
<?php include_once'footer.php' ?>
