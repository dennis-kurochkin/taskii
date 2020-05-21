import React from 'react';

import { Grid, Segment, Container, Header, Icon } from 'semantic-ui-react';
import NavigationMenu from './Navigation.Menu';

const Main = () => {
    return (
        <Container>
            <Grid centered columns={2}>
                <Grid.Row>
                    <Grid.Column width={5}>
                        <NavigationMenu />
                    </Grid.Column>
                    <Grid.Column width={11}>
                        <Segment>
                            <h2>contents</h2>
                        </Segment>
                    </Grid.Column>
                </Grid.Row>
            </Grid>
        </Container>
    );
}

export default Main;