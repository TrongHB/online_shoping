<?php
$conn = pg_connect("postgres://yqlyidtbqsygjx:6585eb33cfdd7a8286439ef1469a03aeb193a22d50cc8180b36e30468e144d45@ec2-54-160-200-167.compute-1.amazonaws.com:5432/dcflavd47l2dgs");
if (!$conn) {
    die("Connection fail");
}
?>