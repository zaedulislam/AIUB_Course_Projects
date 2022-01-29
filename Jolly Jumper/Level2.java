import javafx.application.Application;
import javafx.beans.property.ObjectProperty;
import javafx.beans.property.SimpleObjectProperty;
import javafx.geometry.Point2D;
import javafx.stage.Stage;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.scene.image.ImageView;
import javafx.scene.image.Image;
import javafx.scene.paint.Color;
import javafx.scene.shape.Rectangle;
import javafx.scene.layout.*;
import javafx.scene.input.KeyEvent;
import javafx.event.EventHandler;
import javafx.scene.control.*;
import javafx.scene.effect.DropShadow;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.HBox;
import javafx.geometry.Pos;
import javafx.event.ActionEvent;
import javafx.scene.text.*;
import javafx.scene.paint.Paint;
import java.awt.Shape;
import java.util.ArrayList;
import javafx.application.Platform;


public class Level2 extends Application{
	static Stage copyStage;
	
	private static Label scoreLabel2;
	
	public static Label getScoreLabel2(){
		return scoreLabel2;
	}
	
    @Override
    public void start(Stage primaryStage) {
        try {
			copyStage = primaryStage;
		
            Pane root = new Pane();					
			
			//create hero
			Hero bestHero = new Hero();
			
			//add hero to pane
            root.getChildren().add(bestHero.getHeroImageView());
			
			//set position for hero
			bestHero.setPosition(100,585);
			
			//create enemy bird 1
			EnemyBird bird1 = new EnemyBird();
			
			//set initial position for bird1
			bird1.setPosition(1000,580);					

			root.getChildren().add(bird1.getEnemyBirdImageView());
				
			//create Zombie
			Zombie zmbi1 = new Zombie();
			
			//set initial position for bird2
			zmbi1.setPosition(1000,620);		

			root.getChildren().add(zmbi1.getZombieImageView());
						
									
			//create scene
            Scene scene = new Scene(root,1200,800);
			
			//create game background
			GameBackground forest = new GameBackground();
			root.setBackground(new Background(forest.getImage()));
			
			//create score board
			scoreLabel2 = new Label("Score: " + String.valueOf(Hero.getScore()));
			scoreLabel2.setFont(new Font("Candara", 32));
			scoreLabel2.setTextFill(Color.web("#E8480C"));
			scoreLabel2.setTextAlignment(TextAlignment.LEFT);
			scoreLabel2.setTranslateX(1000);
			
			//create PLAY button
			Button playButton = new Button("Play");
			playButton.setStyle("-fx-font: 32 candara; -fx-base: #FF9E2B;");
			
			//applying shadow effect on PLAY button
			DropShadow shadow = new DropShadow();
			
			//Adding the shadow when the mouse cursor is on
			playButton.addEventHandler(MouseEvent.MOUSE_ENTERED, 
				new EventHandler<MouseEvent>() {
					@Override public void handle(MouseEvent e) {
						playButton.setEffect(shadow);
					}
			});
			
			//Removing the shadow when the mouse cursor is off
			playButton.addEventHandler(MouseEvent.MOUSE_EXITED, 
				new EventHandler<MouseEvent>() {
					@Override public void handle(MouseEvent e) {
						playButton.setEffect(null);
					}
			});
			
			//Adding playing functionality
			playButton.addEventHandler(MouseEvent.MOUSE_PRESSED, 
				new EventHandler<MouseEvent>() {
					@Override public void handle(MouseEvent e) {
						Zombie.setPlay(true);
						EnemyBird.setPlay(true);
					}
			});
			
			//create PAUSE button
			Button pauseButton = new Button("Pause");
			pauseButton.setStyle("-fx-font: 32 candara; -fx-base: #FF9E2B;");
			
			//Adding the shadow when the mouse cursor is on
			pauseButton.addEventHandler(MouseEvent.MOUSE_ENTERED, 
				new EventHandler<MouseEvent>() {
					@Override public void handle(MouseEvent e) {
						pauseButton.setEffect(shadow);
					}
			});
			
			//Removing the shadow when the mouse cursor is off
			pauseButton.addEventHandler(MouseEvent.MOUSE_EXITED, 
				new EventHandler<MouseEvent>() {
					@Override public void handle(MouseEvent e) {
						pauseButton.setEffect(null);
					}
			});
			
						
			//Adding pausing functionality
			pauseButton.addEventHandler(MouseEvent.MOUSE_PRESSED, 
				new EventHandler<MouseEvent>() {
					@Override public void handle(MouseEvent e) {
						Zombie.setPlay(false);
						EnemyBird.setPlay(false);
					}
			});
			
			HBox layout = new HBox(15);
			layout.getChildren().addAll(playButton, pauseButton);	

			root.getChildren().addAll(layout, scoreLabel2);
			
            primaryStage.setScene(scene);
			primaryStage.setTitle("Jolly Jumper");
            primaryStage.show();
			
			//animate enemies
			bird1.move();
			
			zmbi1.move();
			
			//keyboard input and character jump			
				scene.addEventFilter(KeyEvent.KEY_RELEASED, e->{
					bestHero.jump();
			});
							
        } catch(Exception e) {
           
        }
    }	
}