<pre>
  <?php

// POST variables
if(isset($_POST)):
  $url_to_test = $_POST['site_url'];
else:
  die(json_encode(array("error",'Geen URL opgegeven')));
endif;

require_once("Services_WTF_Test.php");

$test = new Services_WTF_Test("odilio@imaga.nl", "6264f920ffb63f57200d98cea0666ce6");

$testid = $test->test(array(
    'url' => $url_to_test,
    'location' => 2
));

if ($testid):
    // Test OK
else:
  // Test Failed
    die(json_encode(array("error",'Test Failed: ' . $test->error())));
endif;

$test->get_results();

if ($test->error()):
    die($test->error());
endif;

$testid = $test->get_test_id();
$results = $test->results();
$resources = $test->resources();
$status = $test->status();

$refill_date = date("d-m-Y H:i:s", $status["api_refill"]);
$remaining_credits = $status["api_credits"];




/*
Testing http://gtmetrix.com/
Test started with gyzbzWnG
Waiting for test to finish
Test completed succesfully with ID gyzbzWnG
onload_time => 3466
first_contentful_paint_time => 1502
page_elements => 18
report_url => https://gtmetrix.com/reports/gtmetrix.com/RsaAfJWz
redirect_duration => 282
first_paint_time => 1502
dom_content_loaded_duration =>
dom_content_loaded_time => 2293
dom_interactive_time => 2293
page_bytes => 696671
page_load_time => 3466
html_bytes => 5393
fully_loaded_time => 3616
html_load_time => 911
rum_speed_index => 1871
yslow_score => 88
pagespeed_score => 99
backend_duration => 187
onload_duration => 0
connect_duration => 442

Resources
Resource: report_pdf https://gtmetrix.com/api/0.1/test/gyzbzWnG/report-pdf PDF
Resource: pagespeed https://gtmetrix.com/api/0.1/test/gyzbzWnG/pagespeed JSON
Resource: har https://gtmetrix.com/api/0.1/test/gyzbzWnG/har
Resource: pagespeed_files https://gtmetrix.com/api/0.1/test/gyzbzWnG/pagespeed-files
Resource: report_pdf_full https://gtmetrix.com/api/0.1/test/gyzbzWnG/report-pdf?full=1
Resource: yslow https://gtmetrix.com/api/0.1/test/gyzbzWnG/yslow JSON
Resource: screenshot https://gtmetrix.com/api/0.1/test/gyzbzWnG/screenshot IMAGE
Loading test id gyzbzWnG
Deleting test id gyzbzWnG

Locations GTmetrix can test from:
GTmetrix can run tests from: Vancouver, Canada using id: 1 default (1)
GTmetrix can run tests from: London, UK using id: 2 default ()
GTmetrix can run tests from: Sydney, Australia using id: 3 default ()
GTmetrix can run tests from: Dallas, USA using id: 4 default ()
GTmetrix can run tests from: Mumbai, India using id: 5 default ()
GTmetrix can run tests from: São Paulo, Brazil using id: 6 default ()
GTmetrix can run tests from: Hong Kong, China using id: 7 default ()

*/
?>
</pre>
