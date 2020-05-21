import React from 'react';
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Redirect,
    withRouter
} from 'react-router-dom';

import HeaderNavigation from './shared/components/Navigation/HeaderNavigation';
import Login from './login/pages/Login';
import Tasks from './tasks/pages/Tasks';
import Main from './shared/components/Navigation/Main';

const Routes = withRouter(({ location }) => {
    return (
        <React.Fragment>
            {
                location.pathname !== '/login' && <HeaderNavigation />
            }
            <Switch>
                <Route path="/" exact>
                    <Main>
                        <Tasks />
                    </Main>
                </Route>
                <Route path="/login" exact>
                    <Login />
                </Route>
                <Redirect to="/" />
            </Switch>
        </React.Fragment>
    );
});

const App = () => {
    return (
        <Router>
            <Routes />
        </Router>
    );
}

export default App;
