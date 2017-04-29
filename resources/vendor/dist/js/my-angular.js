/**
 * Created by dramd on 12/27/2016.
 */

var app = angular.module('aplikacioni', ['ngMaterial']);

app.config(function ($interpolateProvider) {

    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');

});

(function() {
    'use strict';

    angular.module(['ngMaterial'])
        .controller('FabCtrl', function($scope, $mdDialog, $timeout) {
            var self = this;

            self.hidden = false;
            self.isOpen = false;
            self.hover = false;

            // On opening, add a delayed property which shows tooltips after the speed dial has opened
            // so that they have the proper position; if closing, immediately hide the tooltips
            $scope.$watch('fabi.isOpen', function(isOpen) {
                if (isOpen) {
                    $timeout(function() {
                        $scope.tooltipVisible = self.isOpen;
                    }, 600);
                } else {
                    $scope.tooltipVisible = self.isOpen;
                }
            });

            self.items = [
                { name: "Project", icon: "../resources/vendor/dist/img/icons/project-add.svg", direction: "left" },
                { name: "Activity", icon: "../resources/vendor/dist/img/icons/activity-add.svg", direction: "left" },
                { name: "Task", icon: "../resources/vendor/dist/img/icons/task-add.svg", direction: "left" }
            ];

            //self.openDialog = function($event, item) {
            //    // Show the dialog
            //    $mdDialog.show({
            //        clickOutsideToClose: true,
            //        controller: function($mdDialog) {
            //            // Save the clicked item
            //            this.item = item;
            //
            //            // Setup some handlers
            //            this.close = function() {
            //                $mdDialog.cancel();
            //            };
            //            this.submit = function() {
            //                $mdDialog.hide();
            //            };
            //        },
            //        controllerAs: 'dialog',
            //        templateUrl: 'dialog.html',
            //        targetEvent: $event
            //    });
            //};
        });
})();