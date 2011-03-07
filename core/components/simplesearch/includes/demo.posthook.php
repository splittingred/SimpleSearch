<?php

$results = array();
for ($i = $offset+1; $i <= $offset+$limit; $i++) {
    $results[] = array(
        'pagetitle' => 'Test Result '.$i,
        'longtitle' => '',
        'id' => $i,
        'extract' => 'A test result from the posthook.',
    );
}
$hook->addFacet('test',$results,50);

return true;