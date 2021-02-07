define([
    'jquery',
    'Magento_Ui/js/modal/alert',
    'Magento_Ui/js/modal/modal',
    'mage/translate',
    'underscore',
    'jquery/ui',
], function ($,alert,modal, $t, _) {
    var items = [];
    $.widget('mage.secondFooter', {

        options: {
            triggerbtn : $('.click-popup')
        },

        _create: function () {
            let triggerbtn = this.options.triggerbtn,
                self = this,
                randomNumber = self._randomNumber(50),
                msg,inBetween,rmLast;

            triggerbtn.on("click", function () {
                var options = {
                    type: 'popup',
                    responsive: true,
                    innerScroll: true,
                    title: 'Game',
                    buttons: [{
                        text: $.mage.__('Guess'),
                        class: '',
                        click: function () {
                            let numboros = self._guardarNumeros();
                            if(numboros === false){
                                return false;
                            }
                            inBetween = self._between(Number($('#random_number').val()), Number(randomNumber));
                            if(inBetween === 'value_lower'){
                                $('#notify-msg').html($.mage.__('The number entered was below than the random number.'));
                                return false;
                            }
                            if(inBetween === 'value_greater'){
                                $('#notify-msg').html($.mage.__('The number entered was higher than the random number.'));
                                return false;
                            }
                            if(inBetween === 'inbetween'){
                                rmLast = numboros.pop();
                                msg = numboros.join();
                                $('#notify-msg').html($.mage.__('Number is correct.Old entered numbers are ' + msg));
                                $('#notify-msg-c').html($.mage.__('Correct one is ' + rmLast));
                                $('#random_number').hide('slow');
                            }
                        }
                    }]
                };
                var popup = modal(options, $('#popup-modal'));
                $('#popup-modal').modal('openModal');
            });
        },
        _randomNumber: function(max){
            return Math.floor(Math.random() * Math.floor(max));
        },
        _guardarNumeros: function () {
            var boxvalue = $('#random_number').val();
            let self = this;
            if(!isNaN(boxvalue) && boxvalue != '') {
                items.push(boxvalue);
                $('#notify-msg').html();
                return items;
            }else{
                $('#notify-msg').html($.mage.__('Please enter valid number'));
                return false;
            }
            return false; // stop submission
        },
        _between: function(x, randomNumber) {
            if(x > randomNumber){
                return 'value_greater';
            }
            if(x< randomNumber){
                return 'value_lower';
            }
            if(x === randomNumber){
                return 'inbetween';
            }
            return false;
        },

    });
    return $.mage.secondFooter;
});