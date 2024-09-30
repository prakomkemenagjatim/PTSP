<ul class="breadcrumb">
    <li><a href="#">Data</a></li>                    
    <li class="active"><?php echo $title;?></li>
</ul>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-success margin-b-5">
		<div class="panel-heading">
		    <div class="panel-title-box">
		        <h3>Data Tabel <?php echo $title;?> </h3>
		    </div>                                    
		</div>
		<style>
			.panel .panel-body{
				padding:5px;
			}
		</style>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-3 col-xs-12 padding-lr-5 margin-t-10">
                    <div class="input-group">
                        <span class="input-group-addon">Tanggal <span class="fa fa-fw fa-calendar"></span></span>
                        <input id="search_tgl1" type="text" class="form-control datepicker" value="">                                           
                    </div>
                </div> 
                <div class="col-md-2 col-xs-12 padding-lr-5 margin-t-10"> 
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                        <input id="search_tgl2" type="text" class="form-control datepicker" value="">                                           
                    </div>
                </div> 
				<div class="col-md-4 col-xs-12 padding-lr-5 margin-t-10">
				<input id="search_cari" class="easyui-searchbox" data-options="prompt:'Please Input Value',menu:'#mm',searcher:doSearch" style="width:100%;height: 30px;"></input>
				<div id="mm" style="width:200px">
					<div data-options="name:'username'">User Name</div>
					<div data-options="name:'aksi'">Aksi</div>
					<div data-options="name:'tgl'">Tanggal</div>
				</div>
				</div>
				<div class="col-md-3 col-xs-12 padding-lr-5 margin-t-10"> 
                	<button id="btncari" class="btn btn-success btn-block">Tampilkan Data</button>
          		</div>
                </div>
                <div class="row">
				
				
			</div>
		</div>
    </div>
</div>
	<div class="col-md-12 easyui-layout">
		<table id="dg" class="easyui-datagrid" style="height:400px"
		        url="" striped="true" pagination="true"
		        rownumbers="true"  nowrap="false" singleSelect="true">
				<thead>
		            <tr>
		                <th data-options="field:'username',width:150,align:'center'" sortable="true">USER NAME</th>
		                <th data-options="field:'aksi',width:200" sortable="true">AKSI</th>
		                <th data-options="field:'tgl',width:200" sortable="true">TANGGAL</th>
		            </tr>
		        </thead>
		</table>
	</div>

</div>
<?php $this->load->view('site_js'); ?>
<script type="text/javascript">
	var selected = '';
	var datepicker = $(".datepicker"),
	      scari = $("#search_cari"),
	      stgl1 = $("#search_tgl1"),
	      stgl2 = $("#search_tgl2"),
	      btncari = $('#btncari');
	$(document).ready(function(){
	  var fistDate = new Date();
	  var endDate = new Date();
	  fistDate.setDate(fistDate.getDate() - 7); 
	  datepicker.datepicker('update', endDate);
	  stgl1.datepicker('update', fistDate);  
	  
	  $('#dg').datagrid({url:"<?php echo base_url('index.php/user/getuserlog')?>",queryParams:{
			icari: scari.searchbox("getName"),
			ncari: scari.searchbox("getValue"),
			ntgl1:stgl1.val(),
			ntgl2:stgl2.val(),
			},onError: function(index,row){
	    		alert(row.message)
	  }});
		btncari.click(function(){
		   loaddata();
		});
		datepicker.on('keydown',function(e){
         if (e.which == 13){
		 	e.preventDefault();
		 	loaddata();
		 }			
		})
	})
	
	function loaddata(){
		$('#dg').datagrid('load',{
			icari: scari.searchbox("getName"),
			ncari: scari.searchbox("getValue"),
			ntgl1:stgl1.val(),
			ntgl2:stgl2.val(),
		});
	}
	
	function doSearch(ivalue,iname){
		$('#dg').datagrid('load',{
			icari: iname,
			ncari: ivalue,
			ntgl:stgl1.val(),
			ntgl1:stgl2.val(),
		});
		
	}
</script>                              







