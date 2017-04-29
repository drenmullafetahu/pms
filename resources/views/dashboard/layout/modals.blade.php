<?php
$img_src = Auth::user()->img_src . '.' . 'jpg';
$user = Auth::user()->id;

$projectNames = $projectsModel->getProjectTitle();
$userNmaes = $tasksModel->getUsers();
$priorities = $tasksModel->getPriorities();
$taskDetails = $tasksModel->getStatuses();
$statuses = $tasksModel->getDetailedTasks();
$projectNamesList = [];
foreach ($projectNames as $project) {
    $projectNamesList[$project['project_title']] = $project['id'];
}
$userNamesList = [];
foreach ($userNmaes as $names) {
    $userNamesList[$names['name']] = $names['id'];
}
$prioritiesList = [];
foreach ($priorities as $priority) {
    $prioritiesList[$names['name']] = $names['id'];
}
$statusesList = [];
foreach ($statuses as $status) {
    $statusesList[$status['status_title']] = $status['status_id'];
}
?>
