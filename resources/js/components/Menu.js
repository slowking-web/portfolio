import React from "react";
import ReactDOM from "react-dom";

export default class Menu extends React.Component {
	constructor(props) {
		super(props);
		
		this.state = { 
			isOpen: false,
			menus: []
		};
		
		this.timeOutId = null;
		
		this.onClickHandler = this.onClickHandler.bind(this);
		this.onBlurHandler = this.onBlurHandler.bind(this);
		this.onFocusHandler = this.onFocusHandler.bind(this);
		
		// DBから「menu」テーブルを取得する
		axios.get('menu/json').then(response=>{
			let get_menu = response.data;
			this.setState({menus:get_menu});
		});
	}
	
	onClickHandler() {
		this.setState(currentState => ({
		isOpen: !currentState.isOpen
		}));
	}
	
	onBlurHandler() {
		this.timeOutId = setTimeout(() => {
			this.setState({
			isOpen: false
			});
		});
	}
	
	onFocusHandler() {
		clearTimeout(this.timeOutId);
	}
	
	render() {
		return (
			<div onBlur={this.onBlurHandler}
			onFocus={this.onFocusHandler}>
				<dl id="menubar">
					<dt 
						onClick={this.onClickHandler}
						aria-haspopup="true"
						aria-expanded={this.state.isOpen}>
						Menu
					</dt>
					{this.state.isOpen && this.state.menus.map(menu => (
						<React.Fragment key={menu.id}>
						<dd><a href={menu.url}>{menu.name}</a></dd>
						</React.Fragment>
					))}
				</dl>
			</div>
		);
	}
}

if (document.getElementById('menu')) {	
    ReactDOM.render(<Menu />, document.getElementById('menu'));	
}