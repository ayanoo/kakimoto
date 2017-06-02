<?php 
class TestShell extends Shell { 
  function main () { 
    $this->out('test.'); // 標準出力には $this->out() を利用。 
  } 
 
  function test2 () { 
    $this->out('test2.'); // 標準出力には $this->out() を利用。 
  } 
} 