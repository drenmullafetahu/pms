<div ng-controller="FabCtrl as fabi" ng-cloak="">
    <md-fab-speed-dial md-direction="up" md-open="fabi.isOpen" class="md-scale" id="menyja1">
        <md-fab-trigger>
            <md-button aria-label="menu" class="md-fab md-warn">
                <md-icon md-svg-src="{{http_resources('/vendor/dist/img/icons/menu.svg')}}" aria-label="menu"></md-icon>
            </md-button>
        </md-fab-trigger>

        <md-fab-actions>
            <div>

                <md-button id="menu1" aria-label="menu1" class="md-fab md-raised md-mini" data-toggle="modal"
                           data-target="#create-project-modal">
                    <md-tooltip md-direction="left" md-visible="tooltipVisible" md-autohide="false">Project</md-tooltip>
                    <md-icon md-svg-src="{{http_resources('/vendor/dist/img/icons/project-add.svg')}}"
                             aria-label="menu1"></md-icon>
                </md-button>
                <md-button id="menu2" aria-label="menu2" class="md-fab md-raised md-mini" data-toggle="modal"
                           data-target="#create-activity-modal">
                    <md-tooltip md-direction="left" md-visible="tooltipVisible" md-autohide="false">Activity
                    </md-tooltip>
                    <md-icon md-svg-src="{{http_resources('/vendor/dist/img/icons/activity-add.svg')}}"
                             aria-label="menu2"></md-icon>
                </md-button>

                <md-button id="menu3" aria-label="menu3" class="md-fab md-raised md-mini" data-toggle="modal"
                           data-target="#create-task-modal">
                    <md-tooltip md-direction="left" md-visible="tooltipVisible" md-autohide="false">Task</md-tooltip>
                    <md-icon md-svg-src="{{http_resources('/vendor/dist/img/icons/task-add.svg')}}"
                             aria-label="menu3"></md-icon>
                </md-button>
            </div>
        </md-fab-actions>
    </md-fab-speed-dial>

</div>

