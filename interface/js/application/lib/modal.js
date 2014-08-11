var modalController = {
    /**
     * Creates a modal screen with options
     * @param string title indicates the title of the modal screen (shown in header)
     * @param string content indicates the content of the screen body (can be HTML)
     * @param array arrButtons defines the buttons of the screen with respective callbacks.
     * Must contain the following structure: 
     *     {
     label: <string> indicating the label of the button,
     callback: <function> will be called onClick,
     primary: <bool> if the button is the main of the modal screen,
     dismiss: <bool> if the button causes dismiss of the modal screen,
     }
     * @returns {undefined}
     */
    show: function(title, content, arrButtons) {
        var modalTemplate = $("#__genericModalTemplate");
        var modalBtnTemplate = $("#__modalBtnTemplate");
        arrButtons = arrButtons || [];

        modal = modalTemplate.clone();
        $("#__genericModal-title", modal).html(title);
        $("#__genericModal-body", modal).html(content);


        for (var i = 0; i < arrButtons.length; i++)
        {
            button = modalBtnTemplate.clone();

            if (arrButtons[i].primary) {
                button.removeClass('btn-default').addClass('btn-primary');
            }

            if (arrButtons[i].dismiss) {
                button.attr('data-dismiss', 'modal');
            }

            // Passa para a função de callback decladara, um objeto contendo <nome do input> => <valor do input>
            callbackFunction = function(event) {
                var button = event.data.button;
                var params = {};
                $('input, select, textarea', modal).each(function() {
                    var inputName = $(this).attr('name');
                    if (inputName !== undefined && inputName !== '') {
                        params[inputName] = $(this).val();
                    }
                });
                button.callback(params);
            };

            button.html(arrButtons[i].label);
            button.bind('click', {button: arrButtons[i]}, callbackFunction);
            $("#__genericModal-footer", modal).append(button);
        }
        modal.modal('show');
    },
    /**
     * Facade of the show method abstracting a simple Yes/No confirmation screen
     * @param {type} title
     * @param {type} content
     * @param {type} okCallback
     * @param {type} cancelCallback
     * @returns {undefined}
     */
    confirm: function(title, content, okCallback, cancelCallback) {
        buttons = [
            {
                label: 'Sim',
                callback: okCallback,
                primary: true,
                dismiss: true,
            },
            {
                label: 'Não',
                callback: cancelCallback,
                primary: false,
                dismiss: true,
            }
        ];

        this.show(title, content, buttons);
    },
    /**
     * Facade of the show method abstracting a simple Yes/No confirmation screen
     * @param {type} title
     * @param {type} content
     * @param {type} okCallback
     * @param {type} cancelCallback
     * @returns {undefined}
     */
    alert: function(title, content, okCallback) {
        buttons = [
            {
                label: 'OK',
                callback: okCallback,
                primary: true,
                dismiss: true,
            },
        ];

        this.show(title, content, buttons);
    },
}