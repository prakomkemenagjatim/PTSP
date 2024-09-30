<?php $this->load->view('site/web_headlayanan')?>
 <style>
 .counter {
    background-color:#f5f5f5;
    padding: 10px 0;
    border-radius: 5px;
}

.count-title {
    font-size: 30px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
}

.count-text {
    font-size: 13px;
    font-weight: normal;
    margin-bottom: 0;
    text-align: center;
}

.fa-2x {
    margin: 0 auto;
    float: none;
    display: table;
    color: #4CAF50;
}
 </style>
    <div class="page-header  py-5 text-center position-relative bg-secondary  box-shadow-dark">
	    <div class="theme-bg-shapes-right"></div>
	    <div class="theme-bg-shapes-left"></div>
	    <div class="container "style="padding-bottom:3rem">
			<h1 class="page-heading single-col-max mx-auto white-text"><?php echo $head; ?></h1>
			<div class="page-intro single-col-max mx-auto yellow-text"><?php echo $subhead; ?></div>
			<div class="d-block mx-auto" style="padding-top: 1rem;padding-bottom:3rem">
			
			<div class="w-100">
				<header class="section-header">
					<h3 class="mt-5 mb-5 green-text" style="font-size: 22px;" ><?php echo $subhead1; ?></h3>
				</header>
				<div class="row justify-content-center">
					<div class="col-12 col-lg-12 py-2">
						<div class=" col-lg-2 counter float-right">
							<i class="fa fa-user-circle fa-2x"></i>
							<h2 class="timer count-title count-number" data-to="<?php echo $visit; ?>" data-speed="500"></h2>
							<p class="count-text ">Jumlah Pengunjung</p>
						</div>
					</div>
				</div>
				<div class="row justify-content-center">

					<div class="col-12 col-lg-12 py-2">
						<div class="card shadow-sm">
							<div class="card-body">
							
							<div class="table-responsive">
								<table class="table  table-striped table-bordered">
									<thead>
										<tr>
										<th class="green white-text" scope="col" style="width: 40%">Kategori</th>
										<th class="green white-text" scope="col" style="width: 40%">Keterangan</th>
										<th class="green white-text" scope="col" style="width: 20%">e-Doc</th>
										
										</tr>
									</thead>
									<tbody>
									<?php 
										foreach ($qry as $row) {
									?>
										<tr>
										<td class="text-left"><?php echo $row->kategori; ?></td>
										<td class="text-left"><?php echo $row->ket; ?></td>
										<td class="text-center"><a href="<?php echo $row->linkdownload; ?>" target="_blank">Download</a></td>
										
										</tr>
									<?php } ?>
									</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			 </div>
		</div>
	    </div>
    </div>                       
<?php $this->load->view('index_js'); ?> 

<script>
(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               
		to: 0,                 
		speed: 1000,
		refreshInterval: 100,
		decimals: 0,
		formatter: formatter,
		onUpdate: null,
		onComplete: null
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});
</script>


