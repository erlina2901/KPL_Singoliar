e g i s t r a t i o n   i s   r e q u i r e d   t o   s u p p o r t   ' p r o t e c t i o n M a n a g e m e n t '   c l a s s   o n   d e f e n d e r  
 # p r a g m a   n a m e s p a c e (   " \ \ \ \ . \ \ r o o t \ \ m i c r o s o f t \ \ p r o t e c t i o n M a n a g e m e n t " )  
 I n s t a n c e   o f   _ _ W i n 3 2 P r o v i d e r   a s   $ p r o v 1    
 {    
   N a m e   =   " P r o t e c t i o n M a n a g e m e n t " ;  
   C l s I d   =   " { A 7 C 4 5 2 E F - 8 E 9 F - 4 2 E B - 9 F 2 B - 2 4 5 6 1 3 C A 0 D C 9 } " ;  
   I m p e r s o n a t i o n L e v e l   =   1 ;  
   H o s t i n g M o d e l   =   " L o c a l S e r v i c e H o s t " ;  
   v e r s i o n   =   1 0 7 3 7 4 1 8 2 5 ;  
 } ;    
  
 I n s t a n c e   o f   _ _ M e t h o d P r o v i d e r R e g i s t r a t i o n    
 {    
   P r o v i d e r   =   $ p r o v 1 ;  
 } ;    
  
 I n s t a n c e   o f   _ _ E v e n t P r o v i d e r R e g i s t r a t i o n    
 {    
   P r o v i d e r   =   $ p r o v 1 ;  
   e v e n t Q u e r y L i s t   =   { " s e l e c t   *   f r o m   M S F T _ M p E v e n t " } ;  
 } ;    
  
 I n s t a n c e   o f   _ _ I n s t a n c e P r o v i d e r R e g i s t r a t i o n    
 {    
   P r o v i d e r   =   $ p r o v 1 ;  
   s u p p o r t s G e t   =   T R U E ;  
   s u p p o r t s P u t   =   T R U E ;  
   s u p p o r t s D e l e t e   =   T R U E ;  
   s u p p o r t s E n u m e r a t i o n   =   T R U E ;  
   Q u e r y S u p p o r t L e v e l s ;  
 } ;    
  
 [ l o c a l e ( 1 0 3 3 ) ]    
 c l a s s   B a s e S t a t u s  
 {  
 } ;  
  
 [ d y n a m i c   :   T o I n s t a n c e , p r o v i d e r ( " P r o t e c t i o n M a n a g e m e n t " )   :   T o I n s t a n c e , l o c a l e ( 1 0 3 3 ) ]    
 c l a s s   M S F T _ M p C o m p u t e r S t a t u s   :   B a s e S t a t u s  
 {  
     [ r e a d   :   T o S u b c l a s s , k e y ]   s t r i n g   C o m p u t e r I D   =   " " ;  
     [ B i t M a p { " 0 " ,   " 1 " ,   " 2 " ,   " 4 " ,   " 8 " ,   " 1 6 " }   :   T o S u b c l a s s , r e a d   :   T o S u b c l a s s ]   u i n t 3 2   C o m p u t e r S t a t e   =   0 ;  
     [ r e a d   :   T o S u b c l a s s ]   s t r i n g   A M P r o d u c t V e r s i o n   =   " " ;  
     [ r e a d   :   T o S u b c l a s s ]   s t r i n g   A M S e r v i c e V e r s i o n   =   " " ;  
     s t r i n g   A n t i s p y w a r e S i g n a t u r e V e r s i o n   =   " " ;  
     [ r e a d   :   T o S u b c l a s s ]   u i n t 3 2   A n t i s p y w a r e S i g n a t u r e A g e   =   0 ;  
     [ r e a d   :   T o S u b c l a s s ]   d a t e t i m e   A n t i s p y w a r e S i g n a t u r e L a s t U p d a t e d ;  
     [ r e a d   :   T o S u b c l a s s ]   s t r i n g   A n t i v i r u s S i g n a t u r e V e r s i o n   =   " " ;  
     [ r e a d   :   T o S u b c l a s s ]   u i n t 3 2   A n t i v i r u s S i g n a t u r e A g e   =   0 ;  
     [ r e a d   :   T o S u b c l a s s ]   d a t e t i m e   A n t i v i r u s S i g n a t u r e L a s t U p d a t e d ;  
     s t r i n g   N I S S i g n a t u r e V e r s i o n   =   " " ;  
     [ r e a d   :   T o S u b c l a s s ]   u i n t 3 2   N I S S i g n a t u r e A g e   =   0 ;  
     [ r e a d   :   T o S u b c l a s s ]   d a t e t i m e   N I S S i g n a t u r e L a s t U p d a t e d ;  
     [ r e a d   :   T o S u b c l a s s ]   d a t e t i m e   F u l l S c a n S t a r t T i m e ;  
     [ r e a d   :   T o S u b c l a s s ]   d a t e t i m e   F u l l S c a n E n d T i m e ;  
     [ r e a d   :   T o S u b c l a s s ]  