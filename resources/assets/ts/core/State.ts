import jquery from 'jquery';

export default class State {

    private V        : object;
    private app      : HTMLElement;
    private elements : object;

    /**
     * Constructs server object for other modules
     * @param  {Object} V [Server object full of application data. Defaults to empty object]
     * @constructor
     */
    constructor (V ?: object) {
        this.V   = V || {};
        this.app = document.getElementById('app');
    }

    public getServerContext () : object {
        return this.V;
    }

    public setServerContext (V : object) : void {
        this.V = V;
    }

    public setServerContextValue (key : string, value : string) : void {
        this.V[key] = value;
    }

    public addElements (elements : object) : void {
        this.elements = elements;
        // Add data binding here for elements
        this.bindElements();
    }

    private bindElements () : void {
        for (let element in this.elements) {
            this.elements[element].ref.element.addEventListener('change', this, false);
        }
    }

    private handleEvent (event) : void {
        console.log(event);
        switch (event.type) {
            case 'change' : break;
        }
    }
}
