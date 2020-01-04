<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}
	public function location(){
		$data = $_POST['object'];
		$data_access = $data[0];

		$data_object = (object) $data_access;

		$lat = $data_object->latlng[0];
		$lot = $data_object->latlng[1];

		$html="";
		$html.="
				<div id=\"weather-template\" class=\"weather-card\">
		
		<button class=\"remove-city\" id=\"remove-city\">&times;</button>
		<div class=\"city-key\" hidden></div>
		<div class=\"card-last-updated\" hidden></div>
		<div class=\"location\" id=\"location\">$data_object->name</div>
		<div class=\"date\" id=\"date\">$data_object->region</div>
		<div class=\"description\" id=\"description\">Capital: $data_object->capital</div>
		<div class=\"current\">
			<div class=\"visual\">
				<div class=\"icon\"><i class=\"fas fa-city\"></i>
				</div>
				<div class=\"temperature\">
					<span class=\"value\"></span><span class=\"scale\">$data_object->alpha3Code</span>
				</div>
			</div>
			<div class=\"description\">
				    <div style=\"width: 100%;position: relative;\"><iframe width=\"100%\" height=\"100%\" src=\"https://maps.google.com/maps?width=100%&amp;height=100%&amp;hl=en&amp;q=$data_object->name&amp;ie=UTF8&amp;t=&amp;z=5&amp;iwloc=B&amp;output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe><div style=\"position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;\"><small style=\"line-height: 1.8;font-size: 2px;background: #fff;\">Powered by <a href=\"http://www.googlemapsgenerator.com/pt/\">Googlemapsgenerator.com/pt/</a> & <a href=\"https://botonmegusta.org/en/\">http://botonmegusta.org/en/</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div>

			</div>
		</div>
	</div>
		";
		echo json_encode(array("html"=>$html));


	}

	//--------------------------------------------------------------------

}
