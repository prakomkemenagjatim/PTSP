<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('index_head.php')?>
   <style>
        .terminal-window {
            background-color: #000000;
            border: 2px solid #cccccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .terminal-title {
            background-color: #cccccc;
            color: #000000;
            padding: 5px 10px;
            border-bottom: 2px solid #cccccc;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            border-radius: 5px 5px 0 0;
            font-family: monospace;
            font-size: 14px;
        }
        pre {
            background-color: #000000;
            color: #ffffff;
            padding: 15px;
            border-radius: 0 0 5px 5px;
            overflow: auto;
            margin: 0;
            font-family: monospace;
        }
        .commit {
            height: 400px;
        }
        h2 {
            color: #000;
        }
    </style>
<body>

<div class="container-scroller">
<?php $this->load->view('index_navbar.php')?>
<div class="container-fluid page-body-wrapper" style="padding-top: 70px">
<?php $this->load->view('index_menu.php')?>
<div class="main-panel">
<div class="row">
  <div class="col-md-12 stretch-card">
  <div class="card">
  <div class="card-body"> 
  <div class="content-wrapper">
            
            <!-- <div class="terminal-window">
                <div class="terminal-title">Git Fetch Output:</div>
                <pre><?php echo $fetchOutput; ?></pre>
            </div> -->

            <div class="terminal-window">
                <div class="terminal-title">Repository Size:</div>
                <pre><?php echo htmlspecialchars($repoSize); ?></pre>
            </div>

            <div class="terminal-window">
                <div class="terminal-title">Git Pull Output:</div>
                <pre><?php echo $pullOutput; ?></pre>
            </div>

            <div class="terminal-window">
                <div class="terminal-title">Last Commit Details:</div>
                <pre class="commit"><?php echo htmlspecialchars($lastCommit); ?></pre>
            </div>

        </div>
    </div>
    </div>
    </div>
    </div>
<?php $this->load->view('index_footer.php')?>
<?php $this->load->view('index_js.php')?>
</div>
</div>
</div>

</body>

</html>
